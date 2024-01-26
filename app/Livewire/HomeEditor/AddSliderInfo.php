<?php

namespace App\Livewire\HomeEditor;

use DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Home\HomeHeroContent;
use Intervention\Image\ImageManagerStatic as Image;

class AddSliderInfo extends Component
{

    use WithFileUploads;

    public $sliderInfo = [
        'title' => '',
        'image_path' => '',
        'text' => '',
        'cta_text' => '',
        'button_name' => '',
        'cta_url' => ''
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
            $this->dispatch('slider-info-created'); 

        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('slider-info-creation-failed'); 
        }

    }

    private function create()
    {
       return HomeHeroContent::create($this->sliderInfo);
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
    

    public function render()
    {
        return view('livewire.home-editor.add-slider-info');
    }
}
