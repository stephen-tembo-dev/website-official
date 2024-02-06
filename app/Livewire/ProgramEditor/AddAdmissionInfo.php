<?php

namespace App\Livewire\ProgramEditor;

use App\Models\Admissions\Admission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class AddAdmissionInfo extends Component
{

    public $categories;
    public $admissionInfo = [
        'admissionInfo.entry_requirements' => '',
        'admissionInfo.how_to_apply' => '',
        'admissionInfo.fees_and_scholarships' => '',
        'admissionInfo.accomodation' => '',
        'admissionInfo.category' => '',
    ];

    public function mount()
    {
        // make API call to get categories
          $response = Http::get('http://127.0.0.1:8081/api/qualifications');
          $this->categories = $response->json();

    }

    public function processInfo()
    {


        DB::beginTransaction();

        try {

            // Step 1 : validate info
            $validated = $this->validateInfo();


            // Step 2: Store to DB
            $this->create();

            // commit
            DB::commit();

            // give user feedback
            $this->dispatch('admission-info-created');

        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('admission-info-creation-failed');
        }
    }

    private function create()
    {
        return Admission::create($this->admissionInfo);
    }




    private function validateInfo()
    {
        $rules = [
            'admissionInfo.entry_requirements' => 'required',
            'admissionInfo.how_to_apply' => 'required',
            'admissionInfo.fees_and_scholarships' => 'required',
            'admissionInfo.accomodation' => 'required',
            'admissionInfo.category' => 'required',

        ];

        $validated = $this->validate($rules);

        return $validated;
    }

    public function render()
    {
        return view('livewire.program-editor.add-admission-info');
    }
}
