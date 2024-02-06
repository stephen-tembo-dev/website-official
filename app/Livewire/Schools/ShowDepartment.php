<?php

namespace App\Livewire\Schools;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ShowDepartment extends Component
{
    public $department;

    public function mount($departmentSlug)
    {
        try {
            $response = Http::get('http://127.0.0.1:8081/api/departments/' . $departmentSlug);
            $this->department = $response->json();
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.schools.show-department');
    }
}
