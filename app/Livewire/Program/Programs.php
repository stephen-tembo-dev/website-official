<?php

namespace App\Livewire\Program;

use App\Models\Admissions\Admission;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Programs extends Component
{

    public $programs,$category, $admission_infor;

    public function mount($id,$category)
    {
        try {
            $response = Http::get('http://127.0.0.1:8081/api/get-programs/'.$id);
            $this->programs = $response->json();
            $this->category = $category;

            $this->admission_infor = Admission::where('category',$id)->first();

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
