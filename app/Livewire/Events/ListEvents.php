<?php

namespace App\Livewire\Events;

use App\Models\General\Event;
use Livewire\Component;

class ListEvents extends Component
{
    public $events = [];

    public function mount()
    {
        $this->events = Event::latest('created_at')->get();
    }

    public function render()
    {
        return view('livewire.events.list-events');
    }
}
