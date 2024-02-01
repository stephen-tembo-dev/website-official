<?php

namespace App\Livewire\Other;

use App\Models\General\Event;
use Livewire\Component;

class Dashboard extends Component
{
    public $eventsCount;

    public function mount()
    {
        try {
            $this->eventsCount = Event::all()->count();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.other.dashboard')->layout('components.layouts.dashboardLayout');;
    }
}
