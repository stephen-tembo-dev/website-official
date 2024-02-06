<?php

namespace App\Livewire\Other;

use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;
use App\Models\General\Event;
use App\Models\News\NewsStory;
use App\Models\Home\{HomeAboutContent, HomeAnnouncement, HomeHeroContent};


use Livewire\Component;

class Home extends Component
{

    use WithPagination;

    public $pageInfo;
    public $pageSliderInfo;
    public $news;
    public $qualifications = [];
    public $events;

    public function mount()
    {

        try {
            $response = Http::get('http://127.0.0.1:8081/api/qualifications');
            $this->qualifications = $response->json();

            // dd($response->json());
            $this->pageInfo = HomeAboutContent::first();
            $this->pageSliderInfo = HomeHeroContent::all();


            $this->news = NewsStory::latest()->take(3)->get();
            $this->events = Event::latest('created_at')->limit(3)->get();
        } catch (\Exception $e) {
            // handle exception
        }
    }

    #[Layout('layouts.homeLayout')]
    public function render()
    {

        $announcements = HomeAnnouncement::latest('created_at')->paginate(1);

        return view('livewire.other.home', ['announcements' => $announcements])->layout('components.layouts.homeLayout');
    }
}
