<?php

namespace App\Livewire\AboutEditor;

use App\Models\About\AboutInfoList;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddInfoListContent extends Component
{
    public $listContent = [
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
            $this->dispatch('list-content-created');
        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('list-content-creation-failed');
        }
    }

    private function create()
    {
        return AboutInfoList::create($this->listContent);
    }

    private function validateInfo()
    {
        $rules = [
            'listContent.title' => 'required|max:70',
            'listContent.text' => 'required|max:512',
        ];

        $validated = $this->validate($rules);

        return $validated;
    }
    public function render()
    {
        return view('livewire.about-editor.add-info-list-content');
    }
}
