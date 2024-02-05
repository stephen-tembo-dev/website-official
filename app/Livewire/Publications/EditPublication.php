<?php

namespace App\Livewire\Publications;

use App\Models\General\Publication;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditPublication extends Component
{
    public $publicationArr = [
        'title' => '',
        'text'  => '',
    ];

    public ?Publication $publication = null;

    public function mount(Publication $publication)
    {
        try {
            $this->publication = $publication;
            $this->publicationArr = $this->publication->toArray();
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
            $this->dispatch('publication-updated');

            // Redirect to publications page
            redirect(route('publications.index'));
        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('publication-update-failed');
        }
    }

    private function update()
    {
        return $this->publication->update($this->publicationArr);
    }

    private function validateInfo()
    {
        $rules = [
            'publicationArr.title' => 'required|max:255',
            'publicationArr.url' => 'required|url|max:255',
            'publicationArr.author' => 'required|max:255',
            'publicationArr.year' => 'required|numeric|gte:1900|lte:' . now()->format('Y'),
        ];

        $validated = $this->validate($rules);

        return $validated;
    }

    public function render()
    {
        return view('livewire.publications.edit-publication');
    }
}
