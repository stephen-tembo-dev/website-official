<?php

namespace App\Livewire\Other;

use App\Models\About\AboutBanner;
use App\Models\About\AboutInfoList;
use App\Models\About\AboutMainContent;
use Livewire\Component;

class AboutUs extends Component
{
    public $banner = null;
    public $mainContent = null;
    public $infoList = null;

    public function mount()
    {
        try {
            $this->banner = AboutBanner::latest('created_at')->firstOrFail();
            $this->mainContent = AboutMainContent::latest('created_at')->firstOrFail();
            $this->infoList = AboutInfoList::latest('created_at')->limit(4)->get();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.other.about-us');
    }
}
