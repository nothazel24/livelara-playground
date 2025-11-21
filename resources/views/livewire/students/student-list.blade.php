<div>
    <div class="container w-full mx-auto p-4 border border-slate-600 rounded-md">
        <div class="flex">
            <span data-lucide="user-round" width="20" class="me-2"></span>
            <h5>Daftar Siswa</h5>
        </div>

        <table class="mt-3 w-full">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>NISN</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr class="odd:bg-white even:bg-slate-100 text-center">
                        <td class="px-5">{{ $student->name }}</td>
                        <td class="px-5">{{ $student->class }}</td>
                        <td class="px-5">{{ $student->nisn }}</td>
                        <td class="flex align-middle justify-center">
                            <button class="bg-red-600 px-3 py-2 m-3 flex align-middle justify-between text-white gap-2  rounded-md hover:bg-red-700"
                                wire:click.prevent="deleteConfirm({{ $student->id }})">
                                <span data-lucide="trash" width="16"></span>
                                Hapus
                            </button>
                            <button class="bg-amber-500 px-3 py-2 m-3 flex align-middle justify-between text-white gap-2  rounded-md hover:bg-amber-600"
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
