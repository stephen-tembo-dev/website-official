<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CampusLife extends Component
{
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.pages.campus-life');
    }
}
