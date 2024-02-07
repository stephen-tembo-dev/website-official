<?php

namespace App\Livewire\CampusLife;

use App\Enums\CampusLifeItemType;
use App\Models\CampusLife\CampusLifeItem;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;

class EditCampusLifeItem extends Component
{
    use WithFileUploads;

    public ?CampusLifeItem $item = null;

    public $itemArr = [
        'title' => '',
        'text'  => '',
        'type' => CampusLifeItemType::General->value,
        'image_path' => ''
    ];

    public function mount(CampusLifeItem $item)
    {
        try {
            $this->item = $item;
            $this->itemArr = $this->item->toArray();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function processInfo()
    {
        DB::beginTransaction();

        try {

            // Step 1 : validate info
            $validated = $this->validateInfo();

            // Step 2: Handle image upload
            if (is_object($this->itemArr['image_path'])) {
                // Upload new image
                $this->uploadImage();

                // Delete old image
                $this->deleteOldImage($this->item->image_path);
            }

            // Step 3: Update record
            $this->update();

            // commit
            DB::commit();

            // give user feedback
            $this->dispatch('campus-life-item-updated');

            // Redirect to about page
            redirect(route('campus-life.index'));
        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('campus-life-item-update-failed');
        }
    }

    private function update()
    {
        return $this->item->update($this->itemArr);
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
        return view('livewire.campus-life.edit-campus-life-item');
    }
}
