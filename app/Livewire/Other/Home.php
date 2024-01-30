<?php

namespace App\Livewire\Other;

use App\Models\Home\{HomeAboutContent, HomeAnnouncement, HomeHeroContent};
use App\Models\News\NewsStory;


use Livewire\Component;

class Home extends Component
{
    public $pageInfo;
    public $pageSliderInfo;
    public $news;

    public function mount()
    {
        try {
            $this->pageInfo = HomeAboutContent::first();
            $this->pageSliderInfo = HomeHeroContent::all();
            $this->news = NewsStory::latest()->take(3)->get();
        } catch (\Exception $e) {
            // handle exception
        }
    }

    #[Layout('layouts.homeLayout')]
    public function render()
    {
        return view('livewire.other.home')->layout('components.layouts.homeLayout');
    }
}
