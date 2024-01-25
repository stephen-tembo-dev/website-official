<?php

namespace App\Livewire\AboutEditor;

use App\Models\About\AboutMainContent;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddMainContent extends Component
{
    public $mainContent = [
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
            $this->dispatch('main-content-created');
        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('main-content-creation-failed');
        }
    }

    private function create()
    {
        return AboutMainContent::create($this->mainContent);
    }

    private function validateInfo()
    {
        $rules = [
            'mainContent.title' => 'required|max:70',
            'mainContent.text' => 'required|max:2048',
        ];

        $validated = $this->validate($rules);

        return $validated;
    }

    public function render()
    {
        return view('livewire.about-editor.add-main-content');
    }
}
