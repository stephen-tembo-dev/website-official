<?php

namespace App\Livewire\Publications;

use App\Models\General\Publication;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreatePublication extends Component
{
    public $publicationArr = [
        'title' => '',
        'url'  => '',
        'author' => '',
        'year' => ''
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
            $this->dispatch('publication-created');

            // Redirect to publications page
            redirect(route('publications.index'));
        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('publication-creation-failed');
        }
    }

    private function create()
    {
        return Publication::create($this->publicationArr);
    }

    private function validateInfo()
    {
        $rules = [
            'publicationArr.title' => 'required|max:255',
            'publicationArr.url' => 'required|url|max:255',
            'publicationArr.author' => 'required|max:255',
            'publicationArr.year' => 'required|numeric|min:1900|max:' . now()->format('Y'),
        ];

        $validated = $this->validate($rules);

        return $validated;
    }
    public function render()
    {
        return view('livewire.publications.create-publication');
    }
}
