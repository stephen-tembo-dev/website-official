<?php

namespace App\Livewire\AboutEditor;

use App\Models\About\AboutBanner;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class AddBannerContent extends Component
{
    use WithFileUploads;

    public $bannerContent = [
        'title' => '',
        'caption'  => '',
        'image_path' => ''
    ];

    public function processInfo()
    {
        DB::beginTransaction();

        try {

            // Step 1 : validate info
            $validated = $this->validateInfo();


            // Step 2: Upload and change format of image
            $this->uploadImage();

            // Step 3: Store to DB
            $this->create();

            // commit
            DB::commit();

            // give user feedback
            $this->dispatch('banner-content-created');
        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('banner-content-creation-failed');
        }
    }

    private function create()
    {
        return AboutBanner::create($this->bannerContent);
    }

    private function uploadImage()
    {
        // image object
        $image = Image::make($this->bannerContent['image_path']->getRealPath());

        // construct unique image name
        $imageName = time() . '-' . $this->bannerContent['image_path']->getClientOriginalName();

        // construct path to save image to
        $imagePath = 'app/public/uploads/' . $imageName;

        // save to storage path
        $image->save(storage_path($imagePath), 100, 'webp');

        // update array with property with image name
        $this->bannerContent['image_path'] = $imagePath;
    }

    private function validateInfo()
    {
        $rules = [
            'bannerContent.title' => 'required|max:70',
            'bannerContent.caption' => 'required',
            'bannerContent.image_path' => 'required',
        ];

        $validated = $this->validate($rules);

        return $validated;
    }

    public function render()
    {
        return view('livewire.about-editor.add-banner-content');
    }
}
