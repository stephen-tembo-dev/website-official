<?php

namespace App\Livewire\AboutEditor;

use App\Models\About\AboutInfoList;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditInfoListContent extends Component
{
    public $listContentArr = [
        'title' => '',
        'text'  => '',
    ];

    public ?AboutInfoList $listContent = null;

    public function mount(AboutInfoList $listContent)
    {
        try {
            $this->listContent = $listContent;
            $this->listContentArr = $this->listContent->toArray();
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
            $this->dispatch('list-content-updated');

            // Redirect to about page
            redirect(route('about.index'));
        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('list-content-update-failed');
        }
    }

    private function update()
    {
        return $this->listContent->update($this->listContentArr);
    }

    private function validateInfo()
    {
        $rules = [
            'listContentArr.title' => 'required|max:70',
            'listContentArr.text' => 'required|max:512',
        ];

        $validated = $this->validate($rules);

        return $validated;
    }

    public function render()
    {
        return view('livewire.about-editor.edit-info-list-content');
    }
}
