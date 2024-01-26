<?php

namespace App\Livewire\AboutEditor;

use Livewire\Attributes\Layout;
use Livewire\Component;

class AboutEdit extends Component
{
    #[Layout('components.layouts.homeLayout')]
    public function render()
    {
        return view('livewire.about-editor.about-edit');
    }
}
