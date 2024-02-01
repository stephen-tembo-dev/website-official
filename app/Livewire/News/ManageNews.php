<?php

namespace App\Livewire\News;

use Livewire\Component;
use App\Models\News\NewsStory;

class ManageNews extends Component
{
    public function render()
    {
        return view('livewire.news.manage-news', ['news' => NewsStory::all() ]);
    }
}
