<?php

namespace App\Livewire\HomeEditor;

use Livewire\Component;
use App\Models\Home\HomeHeroContent;
use Livewire\Attributes\Layout;

class ManageSlider extends Component
{
    #[Layout('components.layouts.dashboardLayout')]
    public function render()
    {
        return view('livewire.home-editor.manage-slider', ['sliders' => HomeHeroContent::all()]);
    }
}
