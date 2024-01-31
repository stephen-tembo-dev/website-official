<?php

namespace App\Livewire\HomeEditor;

use Illuminate\Support\Facades\Redirect;
use App\Models\Home\HomeAnnouncement;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditAnnouncement extends Component
{
    public $announcementArr = [
        'title' => '',
        'text'  => '',
    ];

    public ?HomeAnnouncement $announcement = null;

    public function mount($announcement_id)
    {
        try {
            $this->announcement = HomeAnnouncement::find($announcement_id);
            $this->announcementArr = $this->announcement->toArray();
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

            // Step 2: Store to DB
            $this->update();

            // commit
            DB::commit();

            // give user feedback
            $this->dispatch('announcement-updated');


            // redirect back
            return Redirect::to('/');

        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('announcement-update-failed');
        }
    }

    private function update()
    {
        return $this->announcement->update($this->announcementArr);
    }

    private function validateInfo()
    {
        $rules = [
            'announcementArr.title' => 'required|max:70',
            'announcementArr.text' => 'required|max:512',
        ];

        $validated = $this->validate($rules);

        return $validated;
    }

    public function render()
    {
        return view('livewire.home-editor.edit-announcement');
    }
}
