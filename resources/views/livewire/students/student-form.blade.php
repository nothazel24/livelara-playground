<div>
    <div class="card p-3">
        <h5>Tambah Siswa</h5>

        <div class="mt-2">
            <label for="name" class="form-label small">Nama</label>
            <input type="text" wire:model.live.debounce="name" class="form-control mb-2" placeholder="John Doe" required autofocus />
            @error('name')
                <span class="small d-block text-danger mt-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-2">
            <label for="class" class="form-label small">Kelas</label>
            <input type="text" wire:model.live.debounce="class" class="form-control mb-2" placeholder="Kelas" required />
            @error('class')
                <span class="small d-block text-danger mt-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-2">
            <label for="nisn" class="form-label small">NISN Siswa</label>
            <input type="text" wire:model.live.debounce="nisn" class="form-control mb-2" placeholder="NISN" required />
            @error('nisn')
                <span class="small d-block text-danger mt-1">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn btn-primary mt-4" wire:click="save">
            Simpan
        </button>
    </div>

</div>
