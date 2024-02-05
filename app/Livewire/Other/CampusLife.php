<?php

namespace App\Livewire\Other;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CampusLife extends Component
{
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.other.campus-life');
    }
}
