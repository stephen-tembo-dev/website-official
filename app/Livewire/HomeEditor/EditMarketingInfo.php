<?php

namespace App\Livewire\HomeEditor;

use DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Home\HomeAboutContent;
use Intervention\Image\ImageManagerStatic as Image;

class EditMarketingInfo extends Component
{

    use WithFileUploads;

    public $marketingInfo;
    public $info;

    public function mount($info_id)
    {
        $this->info= HomeAboutContent::find($info_id);
        $this->marketingInfo = HomeAboutContent::find($info_id)->toArray();
    }

    public function updateInfo()
    {
        DB::beginTransaction();

        try {

            // Step 1 : validate info
            $validated = $this->validateInfo();

            $previousImage = null;

            // Step 2: determine if theres need to upload 
            if (is_object($this->marketingInfo['image_path'])) {

                // reference for previous image
                $previousImage = HomeAboutContent::find($this->info->id)->image_path;

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
            $this->dispatch('marketing-info-updated'); 

        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('marketing-info-update-failed'); 
        }

    }

    private function updateDB()
    {
       return $this->info->update($this->marketingInfo);
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
        return view('livewire.home-editor.edit-marketing-info');
    }
}
