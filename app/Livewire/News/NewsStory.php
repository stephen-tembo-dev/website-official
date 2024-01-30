<?php

namespace App\Livewire\News;

use Livewire\Component;
use App\Models\News\NewsStory as Story;

class NewsStory extends Component
{
    public $story;
    public $other_stories;

    public function mount($news_id)
    {
        $this->story = Story::find($news_id);
        $this->other_stories = Story::latest()->take(4)->where('id', '!=', $news_id)->get(['id', 'title']);
    }

    public function render()
    {
        return view('livewire.news.news-story');
    }
}
