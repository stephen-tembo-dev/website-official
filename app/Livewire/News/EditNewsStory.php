<?php

namespace App\Livewire\News;

use DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\News\NewsStory;
use Intervention\Image\ImageManagerStatic as Image;

class EditNewsStory extends Component
{

    use WithFileUploads;

    public $newsInfo;
    public $story;

    public function mount($news_id)
    {
        $this->story = NewsStory::find($news_id);
        $this->newsInfo = NewsStory::find($news_id)->toArray();
    }

    public function updateInfo()
    {


        DB::beginTransaction();

        try {

            // Step 1 : validate info
            $validated = $this->validateInfo();

            $previousImage = null;
            $previousAttachment = null;

            // Step 2: determine if theres need to upload 
            if (is_object($this->newsInfo['image_path'])) {

                // reference for previous image
                $previousImage = NewsStory::find($this->story->id)->image_path;

                // upload image
                $this->uploadImage();
            }

            // step 3 : check if attachment is present
            if(is_object($this->newsInfo['attachment_path'])){

                 // reference for previous image
                 $previousAttachment = NewsStory::find($this->story->id)->attachment_path;

                 // upload attachment
                $this->uploadAttachment();
            }

            // Step 4: Store to DB
            $this->updateDB();

            // commit
            DB::commit();

            // delete any old image, if image was updated
            $previousImage ? $this->deleteOldImage($previousImage) : '';

            // delete any old attachment, if attachment was updated
            $previousAttachment ? $this->deleteOldAttachment($previousAttachment) : '';

            // give user feedback
            $this->dispatch('news-info-updated');

        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('news-info-update-failed');
        }
    }

    private function updateDB()
    {
        return $this->story->update($this->newsInfo);
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


    private function deleteOldAttachment($previousAttachment)
    {
        // if previous pimage exists delete it from storage
        if ($previousAttachment) {
            $filePath = storage_path("app/public/attachments/$previousAttachment");
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }


    private function uploadImage()
    {
        // image object
        $image = Image::make($this->newsInfo['image_path']->getRealPath());

        // resize image
        $image->fit(500, 500, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        // construct unique image name
        $imageName = time() . '-' . $this->newsInfo['image_path']->getClientOriginalName();

        // construct path to save image to
        $imagePath = 'app/public/uploads/' . $imageName;

        // save to storage path
        $image->save(storage_path($imagePath), 100, 'webp');

        // update array with property with image name
        $this->newsInfo['image_path'] = $imageName;
    }

    private function uploadAttachment()
    {
        // attachment object
        $file = $this->newsInfo['attachment_path'];

        // construct unique attachment name
        $fileName = time() . '-' . $this->newsInfo['attachment_path']->getClientOriginalName();

        // construct path to save attachment to
        $filePath = 'app/public/attachments/' . $fileName;

        // save to storage path
        $file->save(storage_path($filePath));

        // update array with property with attachment name
        $this->newsInfo['attachment_path'] = $fileName;
    }


    private function validateInfo()
    {
        $rules = [
            'newsInfo.title' => 'required|max:70',
            'newsInfo.text' => 'required',
            'newsInfo.video_url' => '',
            'newsInfo.image_path' => 'required',
            'newsInfo.attachment_path' => '',

        ];

        $validated = $this->validate($rules);

        return $validated;
    }

    public function render()
    {
        return view('livewire.news.edit-news-story');
    }
}
