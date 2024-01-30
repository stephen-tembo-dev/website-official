<?php

namespace App\Livewire\Program;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Programs extends Component
{

    public $programs,$category;

    public function mount($id,$category)
    {
        try {
            $response = Http::get('http://127.0.0.1:8000/api/get-programs/'.$id);
            $this->programs = $response->json();
            $this->category = $category;

            // dd($response->json());
        } catch (\Exception $e) {
            // handle exception
        }
    }
    public function render()
    {
        return view('livewire.program.programs');
    }
}
