<?php

namespace App\Livewire\News;

use DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\News\NewsStory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Features\SupportFileUploads\WithFileUploads as SupportFileUploadsWithFileUploads;

class AddNewsStory extends Component
{

    use SupportFileUploadsWithFileUploads;

    public $newsInfo = [
        'title' => '',
        'text'  => '',
        'video_url' => '',
        'attachment_path' => '',
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

            // step 3 : check if attachment is present
            if ($this->newsInfo['attachment_path']) {
                $this->uploadAttachment();
            }

            // Step 4: Store to DB
            $this->create();

            // commit
            DB::commit();

            // give user feedback
            $this->dispatch('news-info-created');

            // redirect to home
            return Redirect::to('/');

        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('news-info-creation-failed');
        }
    }

    private function create()
    {
        return NewsStory::create($this->newsInfo);
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
        $fileName = time() . '-' . $file->getClientOriginalName();
    
        // store the file in the specified directory
        $filePath = $file->storeAs('public/attachments', $fileName);
    
        // update array property with attachment name
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
        return view('livewire.news.add-news-story');
    }
}
