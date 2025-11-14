<?php

namespace App\Livewire\Students;

use App\Livewire\Students\Edit\Edit;
use App\Models\Student;

// inisialisasi event listener
use Livewire\Attributes\On;

// importing traits (helper)
use App\Livewire\Traits\SwalAlert;

use Livewire\Component;

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

    // edit section
    public $studentIdToEdited;

    public function edit($id, $mode = 'edit-form')
    {
        $this->studentIdToEdited = $id;

        // $this->dispatch('open-edit-form', studentId: $id )->to(Edit::class);
        $this->dispatch('change-mode', mode: $mode, studentId: $id)->to(StudentForm::class);
    }

    // inisialisasi variabel siswa yang ingin dihapus
    public $studentIdToDeleted;

    public function deleteConfirm($id)
    {
        // mentimpan id siswa yang akan dihapus
        $this->studentIdToDeleted = $id;

        // mengirim event (message, action)
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
        // muat ulang data ketika terjadi render ulang secara penuh
        $students = Student::latest()->get();

        return view('livewire.students.student-list', [
            // mengirim data ke komponen student-list
            'students' => $students
        ]);
    }
}
