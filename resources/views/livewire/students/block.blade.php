{{-- tag <div> livewire dihilangkan, dan digantikan tag <tr> sebagai root element nya --}}
{{-- NOTE: GUNAKAN wire:key UNTUK MENGGANTIKAN TAG <div>  --}}

<tr wire:key="{{ $student->id }}">
    <td>{{ $student->name }}</td>
    <td>{{ $student->class }}</td>
    <td>{{ $student->nisn }}</td>
    <td class="d-flex align-items-center gap-2 justify-content-center">
        <button class="btn btn-danger btn-sm d-flex gap-1 align-items-center"
            {{-- gunakan $parent. agar method yang ada di dalam komponen bisa dilacak di parent --}}
            wire:click.prevent="$parent.deleteConfirm({{ $student->id }})">
            <span data-lucide="trash" width="16"></span>
            Hapus
        </button>
        <button class="btn btn-warning btn-sm d-flex gap-1 align-items-center px-3"
            wire:click.prevent="$parent.deleteConfirm({{ $student->id }})">
            <span data-lucide="pencil" width="16"></span>
            Edit
        </button>
    </td>
</tr>
