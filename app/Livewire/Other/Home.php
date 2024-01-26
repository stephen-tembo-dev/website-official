<?php

namespace App\Livewire\Other;

use App\Models\Home\HomeAboutContent;
use App\Models\Home\HomeAnnouncement;
use App\Models\Home\HomeHeroContent;
use Livewire\Component;

class Home extends Component
{
    public $pageInfo;
    public $pageSliderInfo;

    public function mount()
    {
        try {
            $this->pageInfo = HomeAboutContent::first();
            $this->pageSliderInfo = HomeHeroContent::all();
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
