<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Students - Murid')]
class Students extends Component
{
    public function render()
    {
        return view('livewire.pages.students');
    }
}
