<?php

namespace App\Livewire\Schools;

use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowSchool extends Component
{
    public $school;
    public $departments;

    public function mount($slug)
    {
        try {
            $baseUrl = 'http://127.0.0.1:8081/api/schools/';
            $schoolResponse = Http::get($baseUrl . $slug);
            $departmentsResponse = Http::get($baseUrl . $slug . '/departments');

            $this->school = $schoolResponse->json();
            $this->departments = $departmentsResponse->json();

            if (!$this->school) {
                return redirect('/');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.schools.show-school');
    }
}
