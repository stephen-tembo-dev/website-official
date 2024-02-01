<?php

namespace App\Livewire\AboutEditor;

use App\Models\About\AboutBanner;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class EditBannerContent extends Component
{
    use WithFileUploads;

    public $bannerContent = [
        'title' => '',
        'caption'  => '',
        'image_path' => ''
    ];

    public ?AboutBanner $banner = null;

    public function mount(AboutBanner $banner)
    {
        try {
            $this->banner = $banner;
            $this->bannerContent = $this->banner->toArray();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function processInfo()
    {
        DB::beginTransaction();

        try {

            // Step 1 : validate info
            $validated = $this->validateInfo();

            // Step 2: Handle image upload
            if (is_object($this->bannerContent['image_path'])) {
                // Upload new image
                $this->uploadImage();

                // Delete old image
                $this->deleteOldImage($this->banner->image_path);
            }

            // Step 3: Update record
            $this->update();

            // commit
            DB::commit();

            // give user feedback
            $this->dispatch('banner-content-updated');

            // Redirect to home
            redirect('/');
        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('banner-content-update-failed');
        }
    }

    private function update()
    {
        return $this->banner->update($this->bannerContent);
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
        $this->bannerContent['image_path'] = $imageName;
    }

    private function deleteOldImage($previousImage)
    {
        $filePath = storage_path("app/public/uploads/$previousImage");

        if (file_exists($filePath)) {
            unlink($filePath);
        }
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
        return view('livewire.about-editor.edit-banner-content');
    }
}
