<?php

namespace App\Livewire\Students;

// Importing traits
use App\Livewire\Traits\SwalAlert;

// validating form
use Livewire\Attributes\Validate;

use Livewire\Attributes\On;

use App\Models\Student;
use Livewire\Component;

use function PHPUnit\Framework\throwException;

class StudentForm extends Component
{
    // pemanggilan traits (helper)
    use SwalAlert;

    // perubahan mode
    public $mode = 'add-form';
    public $studentId;

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
            'name.regex' => 'Nama tidak boleh diisi oleh angka/simbol!',

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

    // add-form listener
    #[On('change-mode')]
    public function changeMode($mode, $studentId = null)
    {
        $this->mode = $mode;
        $this->studentId = $studentId;

        if ($this->mode == $mode) {
            $this->swalSuccess('Success!', 'Berhasil berpindah ke mode edit.');

            // if statement
            if ($this->mode == 'edit-form' && $this->studentId) {
                // cari data berdasarkan id yang diterima
                $student = Student::findOrFail($this->studentId);

                // muat data untuk dikelola form
                $this->name = $student->name;
                $this->class = $student->class;
                $this->nisn = $student->nisn;
            } else {
                // reset / back mode
                $this->reset(['name', 'class', 'nisn', 'studentId']);
            }
        } else {
            $this->reset(['name', 'class', 'nisn', 'studentId']);
            return ($this->swalError('Error!', 'Tidak dapat berpindah mode. Coba hubungi maintainer'));
        }

        $this->dispatch('refresh-data');
    }

    public function backMode()
    {
        $this->mode = 'add-form';
        
        $this->reset(['name', 'class', 'nisn', 'studentId']);
        $this->swalSuccess('Berhasil!', 'Berhasil berpindah ke mode tambah.');
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

    // function update (edit)
    public function update() {
        $this->validate();

        Student::findOrFail($this->studentId)->update([
            'name' => $this->name,
            'class' => $this->class,
            'nisn' => $this->nisn
        ]);

        // change mode & reset form
        $this->mode = 'add-form';
        $this->reset(['name', 'class', 'nisn', 'studentId']);

        $this->swalSuccess('Berhasil!', 'Data siswa berhasil diperbaharui');
        $this->dispatch('refresh-data');
    }

    public function render()
    {
        return view('livewire.students.student-form');
    }
}
