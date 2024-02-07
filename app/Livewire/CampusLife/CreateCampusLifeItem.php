<?php

namespace App\Livewire\CampusLife;

use App\Enums\CampusLifeItemType;
use App\Models\CampusLife\CampusLifeItem;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;

class CreateCampusLifeItem extends Component
{
    use WithFileUploads;

    public $itemArr = [
        'title' => '',
        'text'  => '',
        'type' => CampusLifeItemType::General->value,
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
            $this->dispatch('campus-life-item-created');

            // Redirect to about page
            redirect(route('campus-life.index'));
        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('campus-life-item-creation-failed');
        }
    }

    private function create()
    {
        return CampusLifeItem::create($this->itemArr);
    }

    private function uploadImage()
    {
        // image object
        $image = Image::make($this->itemArr['image_path']->getRealPath());

        // construct unique image name
        $imageName = time() . '-' . $this->itemArr['image_path']->getClientOriginalName();

        // construct path to save image to
        $imagePath = 'app/public/uploads/' . $imageName;

        // save to storage path
        $image->save(storage_path($imagePath), 100, 'webp');

        // update array with property with image name
        $this->itemArr['image_path'] = $imageName;
    }

    private function validateInfo()
    {
        $rules = [
            'itemArr.title' => 'required|max:100',
            'itemArr.text' => 'required|max:255',
            'itemArr.type' => ['required', Rule::in(CampusLifeItemType::toArray())],
            'itemArr.image_path' => 'required',
        ];

        $validated = $this->validate($rules);

        return $validated;
    }

    public function render()
    {
        return view('livewire.campus-life.create-campus-life-item');
    }
}
