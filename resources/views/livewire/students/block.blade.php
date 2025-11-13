<div>
    <tr>
        <td>{{ $student->name }}</td>
        <td>{{ $student->class }}</td>
        <td>{{ $student->nisn }}</td>
        <td>
            <button class="btn btn-danger btn-sm" wire:click="delete({{ $student->id }})">
                Hapus
            </button>
        </td>
    </tr>
</div>
