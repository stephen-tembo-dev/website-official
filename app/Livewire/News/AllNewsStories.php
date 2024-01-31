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
        $news = $this->story ? Story::latest()->where('id', '!=', $this->story->id)->paginate(8) : [];


        return view('livewire.news.all-news-stories', [ 'news' => $news]);
    }
}
