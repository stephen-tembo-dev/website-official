<?php

namespace App\Livewire\ProgramEditor;

use App\Models\Admissions\Admission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class EditAdmissionInfo extends Component
{
    public $admissionInfo;
    public $categories;
    public $info;

    public function mount($admission_info_id)
    {
        // make API call to get categories
        $response = Http::get('http://127.0.0.1:8081/api/qualifications');
        $this->categories = $response->json();

        $this->admissionInfo = Admission::find($admission_info_id)->toArray();;
        $this->info = Admission::find($admission_info_id);
    }

    public function updateInfo()
    {

        DB::beginTransaction();

        try {

            // Step 1 : validate info
            $validated = $this->validateInfo();


            // Step 2: Update DB
            $this->updateDB();

            // commit
            DB::commit();

            // give user feedback
            $this->dispatch('admission-info-updated');

        } catch (\Exception $e) {

            // rollback DB changes
            DB::rollback();

            dd($e);

            // give user feedback
            $this->dispatch('admission-info-update-failed');
        }
    }

    private function updateDB()
    {
        return $this->info->update($this->admissionInfo);
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
        return view('livewire.program-editor.edit-admission-info');
    }
}
