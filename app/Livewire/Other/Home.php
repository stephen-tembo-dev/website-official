<?php

namespace App\Livewire\Other;

use App\Models\General\Event;
use App\Models\Home\HomeAboutContent;
use App\Models\Home\HomeAnnouncement;
use App\Models\Home\HomeHeroContent;
use Livewire\Component;

class Home extends Component
{
    public $pageInfo;
    public $pageSliderInfo;
    public $announcement;
    public $events;

    public function mount()
    {
        try {
            $this->pageInfo = HomeAboutContent::first();
            $this->pageSliderInfo = HomeHeroContent::all();
            $this->announcement = HomeAnnouncement::latest('created_at')->first();
            $this->events = Event::latest('created_at')->limit(3)->get();
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
