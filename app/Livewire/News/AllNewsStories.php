<?php

namespace App\Livewire\News;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\News\NewsStory as Story;

class AllNewsStories extends Component
{

    use WithPagination;

    public $story;

    public function mount()
    {
        $this->story = Story::latest()->take(1)->first();
    }

    public function render()
    {
        return view('livewire.news.all-news-stories', [ 'news' => Story::latest()->take(4)->where('id', '!=',  $this->story->id)->paginate(3)]);
    }
}
