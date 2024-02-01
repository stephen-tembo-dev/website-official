<?php

namespace App\Livewire\News;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\News\NewsStory;

class ManageNews extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.news.manage-news', ['news' => NewsStory::latest()->paginate(4) ]);
    }
}
