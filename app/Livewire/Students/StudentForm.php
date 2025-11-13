<?php

namespace App\Livewire\Students;

// Importing traits
use App\Livewire\Traits\SwalAlert;

// validating form
use Livewire\Attributes\Validate;

use App\Models\Student;
use Livewire\Component;

class StudentForm extends Component
{
    // pemanggilan traits (helper)
    use SwalAlert;

    public $name, $class, $nisn;

    protected function rules()
    {
        return [
            'name' => 'required|min:8|string|regex:/^[A-Za-z\s]+$/',
            'class' => 'required|min:6|string',
            'nisn' => 'required|max:15|string|regex:/^[0-9]+$/'
        ];
    }

    // pesan kustom
    public function messages()
    {
        return [
            // name
            'name.required' => 'Nama tidak boleh kosong!',
            'name.min' => 'Nama terlalu pendek (min 8 karakter).',
            'name.regex' => 'Nama tidak boleh diisi oleh angka!',

            // class
            'class.required' => 'Kelas tidak boleh kosong!',
            'class.min' => 'Kelas terlalu pendek. Isi dengan lengkap!.',

            // nisn
            'nisn.required' => 'NISN tidak boleh kosong!',
            'nisn.max' => 'NISN terlalu panjang!.',
            'nisn.regex' => 'NISN tidak boleh diisi oleh huruf!',
        ];
    }

    // live form validation
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    // function save
    public function save()
    {
        $this->validate();

        Student::create([
            'name' => $this->name,
            'class' => $this->class,
            'nisn' => $this->nisn,
        ]);

        // reset form
        $this->reset();

        // kirim event ke component StudentList
        $this->dispatch('refresh-data')->to(StudentList::class);

        // kirim event notification (sweetalert2)
        $this->swalSuccess(
            'Berhasil!',
            'Data siswa berhasil ditambahkan.'
        );
    }

    public function render()
    {
        return view('livewire.students.student-form');
    }
}
