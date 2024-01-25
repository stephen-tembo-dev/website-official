<?php

namespace App\Livewire\Other;

use Livewire\Component;

class Home extends Component
{
    #[Layout('layouts.homeLayout')]
    public function render()
    {
        return view('livewire.other.home')->layout('components.layouts.homeLayout');
    }
}
