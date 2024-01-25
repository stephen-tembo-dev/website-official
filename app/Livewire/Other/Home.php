<?php

namespace App\Livewire\Other;

use Livewire\Component;

class Home extends Component
{
    public $heroSlides;
    public $programCards;
    public $aboutContent;

    public function mount()
    {
        try {
            $this->heroSlides = \App\Models\Home\HeroContent::all();
            $this->programCards = \App\Models\Home\ProgramsContent::all();
            $this->aboutContent = \App\Models\Home\AboutContent::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    #[Layout('layouts.homeLayout')]
    public function render()
    {
        return view('livewire.other.home')->layout('components.layouts.homeLayout');
    }
}
