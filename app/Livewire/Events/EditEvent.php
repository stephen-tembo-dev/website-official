<?php

namespace App\Livewire\Events;

use App\Models\General\Event;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic as Image;

class EditEvent extends Component
{
    use WithFileUploads;

    public $eventArr = [
        'image_path' => '',
        'title' => '',
        'text' => '',
        'venue' => '',
        'date' => '',
        'time' => '',
    ];

    public ?Event $event = null;

    public function mount(Event $event)
    {
        try {
            $this->event = $event;
            $this->eventArr = $this->event->toArray();
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
            if (is_object($this->eventArr['image_path'])) {
                // Upload new image
                $this->uploadImage();

                // Delete old image
                $this->deleteOldImage($this->event->image_path);
            }

            // Step 3: Store to DB
            $this->update();

            // commit
            DB::commit();

            // give user feedback
            $this->dispatch('event-updated');
        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('event-update-failed');
        }
    }

    private function update()
    {
        return $this->event->update($this->eventArr);
    }

    private function uploadImage()
    {
        // image object
        $image = Image::make($this->eventArr['image_path']->getRealPath());

        // construct unique image name
        $imageName = time() . '-' . $this->eventArr['image_path']->getClientOriginalName();

        // construct path to save image to
        $imagePath = 'app/public/uploads/' . $imageName;

        // save to storage path
        $image->save(storage_path($imagePath), 100, 'webp');

        // update array with property with image name
        $this->eventArr['image_path'] = $imageName;
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
            'eventArr.image_path' => 'required',
            'eventArr.title' => 'required|max:255',
            'eventArr.text' => 'required',
            'eventArr.venue' => 'required',
            'eventArr.date' => 'required|date|after_or_equal:today',
            'eventArr.time' => 'required',
        ];

        $validated = $this->validate($rules);

        return $validated;
    }


    public function render()
    {
        return view('livewire.events.edit-event');
    }
}
