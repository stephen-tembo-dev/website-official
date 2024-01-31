<?php

namespace App\Livewire\Other;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.other.dashboard')->layout('components.layouts.dashboardLayout');;
    }
}
