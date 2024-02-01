<?php

namespace App\Livewire\HomeEditor;

use Livewire\Component;
use App\Models\Home\HomeHeroContent;

class ManageSlider extends Component
{
    public function render()
    {
        return view('livewire.home-editor.manage-slider',['sliders' => HomeHeroContent::all() ]);
    }
}
