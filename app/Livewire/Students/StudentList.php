<?php

namespace App\Livewire\Students;

use App\Models\Student;

// inisialisasi event listener
use Livewire\Attributes\On;

// Livewire dynamic title
use Livewire\Attributes\Title;

// importing traits (helper)
use App\Livewire\Traits\SwalAlert;

use Livewire\Component;

use function Symfony\Component\String\s;

class StudentList extends Component
{
    // gunakan traits
    use SwalAlert;

    // inisialisasi variabel global
    public $students;

    // inisialisasi data siswa (students)
    public function mount()
    {
        $this->fetchData();
    }

    // menerima event refresh-data dari komponen livewire StudentForm
    #[On('refresh-data')]
    public function fetchData()
    {
        // membuat livewire re-render konten dengan data yang terbaru
        $this->students = Student::latest()->get();
    }

    // inisialisasi variabel siswa yang ingin dihapus
    public $studentIdToDeleted;

    public function deleteConfirm($id)
    {
        // mentimpan id siswa yang akan dihapus
        $this->studentIdToDeleted = $id;

        // mengirim event
        $this->swalConfirm('Yakin nih?', 'delete');
    }

    public function delete()
    {
        // mengambil ID dari properti yang disimpan sebelumnya
        $studentId = $this->studentIdToDeleted;

        if ($studentId) {
            // mencari data siswa berdasarkan id, lalu menghapusnya
            Student::findOrFail($studentId)->delete();

            // setelah delete, suruh livewire refresh komponen sendiri
            $this->dispatch('refresh-data');

            // mengirim alert/notifikasi ke browser
            // bingung swalSuccess ini berasal darimana?, coba cek app/Livewire/Traits/SwalAlert.php
            $this->swalSuccess(
                'Deleted!',
                'Data siswa berhasil dihapus.'
            );
        }
    }

    public function render()
    {
        return view('livewire.students.student-list');
    }
}
