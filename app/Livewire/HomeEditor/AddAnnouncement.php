<?php

namespace App\Livewire\HomeEditor;

use App\Models\Home\HomeAnnouncement;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddAnnouncement extends Component
{
    public $announcementArr = [
        'title' => '',
        'text'  => '',
    ];

    public function processInfo()
    {
        DB::beginTransaction();

        try {

            // Step 1 : validate info
            $validated = $this->validateInfo();

            // Step 2: Store to DB
            $this->create();

            // commit
            DB::commit();

            // give user feedback
            $this->dispatch('announcement-created');
        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('announcement-creation-failed');
        }
    }

    private function create()
    {
        return HomeAnnouncement::create($this->announcementArr);
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
        return view('livewire.home-editor.add-announcement');
    }
}
