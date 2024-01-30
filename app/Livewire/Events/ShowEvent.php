<?php

namespace App\Livewire\Events;

use App\Models\General\Event;
use Livewire\Component;

class ShowEvent extends Component
{
    public ?Event $event;
    public $events = [];

    public function mount(Event $event)
    {
        try {
            $this->event = $event;
            $this->events = Event::latest('created_at')
                ->where('id', '!=', $this->event->id)
                ->limit(5)
                ->get();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.events.show-event');
    }
}
