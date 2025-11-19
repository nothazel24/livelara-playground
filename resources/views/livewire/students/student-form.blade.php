<div>
    <div class="card p-3">
        @if ($mode == 'add-form')
            <h5>Tambah siswa</h5>
        @elseif ($mode == 'edit-form')
            <h5>Edit siswa</h5>
        @else
            <h5>Undefined</h5>
        @endif

        <form wire:submit="@if ($mode == 'add-form') save @elseif($mode == 'edit-form') update @endif">
            <div class="mt-2">
                <label for="name" class="form-label small">Nama</label>
                <x-form.input.text name="name" wire:model.live.debounce="name" placeholder="John Doe" autofocus />
            </div>
            <div class="mt-2">
                <label for="class" class="form-label small">Kelas</label>
                <x-form.input.text name="class" wire:model.live.debounce="class" placeholder="Kelas" />
            </div>
            <div class="mt-2">
                <label for="nisn" class="form-label small">NISN Siswa</label>
                <x-form.input.text name="nisn" wire:model.live.debounce="nisn" placeholder="NISN" />
            </div>

            <button class="btn btn-primary mt-3 w-100" type="submit">
                Simpan
            </button>
        </form>

        @if ($mode == 'edit-form')
            <div class="d-flex pt-2 gap-1">
                <a href="#" wire:click.prevent="backMode" style="text-decoration: none;" class="text-dark">Kembali
                    ke tambah siswa</a>
                <span data-lucide="arrow-up-right" width="13"></span>
            </div>
        @endif

    </div>
</div>
