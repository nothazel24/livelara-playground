<div>
    <div class="card p-3 d-flex align-items-center" style="height: 450px;">
        <h5>Edit Siswa</h5>

        <form wire:submit="save">
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
    </div>
</div>
