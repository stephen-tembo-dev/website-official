<?php

namespace App\Livewire\HomeEditor;

use DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Home\HomeAboutContent;
use Intervention\Image\ImageManagerStatic as Image;

class AddMarketingInfo extends Component
{
    use WithFileUploads;

    public $marketingInfo = [
        'title' => '',
        'text'  => '',
        'video_url' => '',
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
            $user = $this->create();

            // commit
            DB::commit();

            // give user feedback
            $this->dispatch('marketing-info-created'); 

        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('marketing-info-creation-failed'); 
        }



    }

    private function create()
    {
       return HomeAboutContent::create($this->marketingInfo);
    }


    private function uploadImage()
    {
        // image object
        $image = Image::make($this->marketingInfo['image_path']->getRealPath());

        // construct unique image name
        $imageName = time() . '-' . $this->marketingInfo['image_path']->getClientOriginalName();

        // construct path to save image to
        $imagePath = 'app/public/uploads/' . $imageName;

        // save to storage path
        $image->save(storage_path($imagePath ), 100, 'webp');

        // update array with property with image name
        $this->marketingInfo['image_path'] = $imageName ;

    }

    private function validateInfo()
    {
        $rules = [
            'marketingInfo.title' => 'required|max:70',
            'marketingInfo.text' => 'required',
            'marketingInfo.video_url' => 'required',
            'marketingInfo.image_path' => 'required',
            
        ];
    
        $validated = $this->validate($rules);

        return $validated;
    }
    


    public function render()
    {
        return view('livewire.home-editor.add-marketing-info');
    }
}
