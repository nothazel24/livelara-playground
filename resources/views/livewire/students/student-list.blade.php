<div>
    <div class="card p-3">
        <div class="d-flex">
            <span data-lucide="user-round" width="20" class="me-2"></span>
            <h5>Daftar Siswa</h5>
        </div>

        <table class="table table-bordered mt-3">
            <thead class="table-info">
                <tr>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>NISN</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    {{-- <livewire:students.block :student="$student" wire:key="{{ $student->id }}" /> --}}
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{{ $student->nisn }}</td>
                        <td class="d-flex align-items-center gap-2 justify-content-center">
                            <button class="btn btn-danger btn-sm d-flex gap-1 align-items-center"
                                wire:click.prevent="deleteConfirm({{ $student->id }})">
                                <span data-lucide="trash" width="16"></span>
                                Hapus
                            </button>
                            <button class="btn btn-warning btn-sm d-flex gap-1 align-items-center px-3"
                                wire:click.prevent="edit({{ $student->id }})">
                                <span data-lucide="pencil" width="16"></span>
                                Edit
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data siswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
