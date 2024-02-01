<?php

namespace App\Livewire\Events;

use App\Models\General\Event;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ManageEvents extends Component
{
    public $events;

    public function mount()
    {
        $this->events = Event::all();
    }

    #[Layout('components.layouts.dashboardLayout')]
    public function render()
    {
        return view('livewire.events.manage-events');
    }
}
