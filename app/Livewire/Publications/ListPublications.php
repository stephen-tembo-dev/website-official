<?php

namespace App\Livewire\Publications;

use App\Models\General\Publication;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ListPublications extends Component
{
    use WithPagination;

    #[Url('search', true)]
    public $search = '';

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.publications.list-publications', [
            'publications' => Publication::latest('created_at')
                ->search($this->search)
                ->paginate(10)
        ]);
    }
}
