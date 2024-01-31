<?php

namespace App\Livewire\Events;

use App\Models\General\Event;
use Livewire\Component;
use Livewire\WithPagination;

class ListEvents extends Component
{
    use WithPagination;

    public ?Event $event;

    public function mount()
    {
        try {
            $this->event = Event::latest('created_at')->first();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.events.list-events', [
            'events' => Event::latest('created_at')
                ->where('id', '!=', $this->event->id)
                ->paginate(3)
        ]);
    }
}
