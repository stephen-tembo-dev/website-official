<?php

namespace App\Livewire\AboutEditor;

use App\Models\About\AboutMainContent;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditMainContent extends Component
{
    public $mainContentArr = [
        'title' => '',
        'text'  => '',
    ];

    public ?AboutMainContent $mainContent = null;

    public function mount(AboutMainContent $mainContent)
    {
        try {
            $this->mainContent = $mainContent;
            $this->mainContentArr = $this->mainContent->toArray();
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
            $this->dispatch('main-content-updated');

            // Redirect to about page
            redirect(route('about.index'));
        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('main-content-update-failed');
        }
    }

    private function update()
    {
        return $this->mainContent->update($this->mainContentArr);
    }

    private function validateInfo()
    {
        $rules = [
            'mainContentArr.title' => 'required|max:70',
            'mainContentArr.text' => 'required|max:2048',
        ];

        $validated = $this->validate($rules);

        return $validated;
    }

    public function render()
    {
        return view('livewire.about-editor.edit-main-content');
    }
}
