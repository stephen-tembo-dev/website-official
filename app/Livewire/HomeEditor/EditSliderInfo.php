<?php

namespace App\Livewire\HomeEditor;

use DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Home\HomeHeroContent;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;

class EditSliderInfo extends Component
{

    use WithFileUploads;

    public $sliderInfo;
    public $slider;

    public function mount($slider_id)
    {
        $this->slider= HomeHeroContent::find($slider_id);
        $this->sliderInfo = HomeHeroContent::find($slider_id)->toArray();
    }

    public function updateInfo()
    {
        DB::beginTransaction();

        try {

            // Step 1 : validate info
            $validated = $this->validateInfo();

            $previousImage = null;

            // Step 2: determine if theres need to upload 
            if (is_object($this->sliderInfo['image_path'])) {

                // reference for previous image
                $previousImage = HomeHeroContent::find($this->slider->id)->image_path;

                // upload image
                $this->uploadImage();

            }
            
            // Step 4: Update DB
            $this->updateDB();

            // commit
            DB::commit();

            // delete any old image, if image was updated
            $previousImage ? $this->deleteOldImage($previousImage) : '';

            // give user feedback
            $this->dispatch('slider-info-updated'); 

            // redirect back
            return Redirect::to('/');

        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('slider-info-update-failed'); 
        }

    }

    private function updateDB()
    {
       return $this->slider->update($this->sliderInfo);
    }


    private function uploadImage()
    {
        // image object
        $image = Image::make($this->sliderInfo['image_path']->getRealPath());

        // construct unique image name
        $imageName = time() . '-' . $this->sliderInfo['image_path']->getClientOriginalName();

        // construct path to save image to
        $imagePath = 'app/public/uploads/' . $imageName;

        // save to storage path
        $image->save(storage_path($imagePath ), 100, 'webp');

        // update array with property with image name
        $this->sliderInfo['image_path'] = $imageName ;

    }

    private function validateInfo()
    {
        $rules = [
            'sliderInfo.title' => 'required|max:70',
            'sliderInfo.text' => 'required',
            'sliderInfo.image_path' => 'required',
        ];
    
        $validated = $this->validate($rules);

        return $validated;
    }

    private function deleteOldImage($previousImage)
    {
        // if previous pimage exists delete it from storage
        if ($previousImage) {
            $filePath = storage_path("app/public/uploads/$previousImage");
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }

    public function render()
    {
        return view('livewire.home-editor.edit-slider-info');
    }
}
