<?php

namespace App\Livewire\Students;

use App\Models\Student;
use Livewire\Component;

class Block extends Component
{
    // MENERIMA DATA STUDENT DARI COMPONENT STUDENTLIST (ini penting supaya data student bisa diterima)
    public Student $student;

    public function render()
    {
        return view('livewire.students.block');
    }
}
