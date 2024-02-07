<?php

namespace App\Livewire\CampusLife;

use App\Models\CampusLife\Activity;
use App\Models\CampusLife\CampusLifeItem;
use App\Models\CampusLife\Facility;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CampusLife extends Component
{
    public $mainItems;
    public $activities;
    public $facilities;

    public function mount()
    {
        try {
            $this->mainItems = CampusLifeItem::where('type', 'general')->get();;
            $this->activities = CampusLifeItem::where('type', 'activity')->get();;
            $this->facilities = CampusLifeItem::where('type', 'facility')->get();;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.campus-life.campus-life');
    }
}
