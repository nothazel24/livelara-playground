<div>
    <div class="border border-slate-500 rounded-md p-4">
        @if ($mode == 'add-form')
            <h5>Tambah siswa</h5>
        @elseif ($mode == 'edit-form')
            <h5>Edit siswa</h5>
        @else
            <h5>Undefined</h5>
        @endif

        <form wire:submit="@if ($mode == 'add-form') save @elseif($mode == 'edit-form') update @endif">
            <div class="flex flex-col mt-2">
                <label for="name" class="text-xs mb-1">Nama</label>
                <x-form.input.text name="name" wire:model.live.debounce="name" placeholder="John Doe" autofocus />
            </div>
            <div class="flex flex-col mt-2">
                <label for="class" class="text-xs mb-1">Kelas</label>
                <x-form.input.text name="class" wire:model.live.debounce="class" placeholder="Kelas" />
            </div>
            <div class="flex flex-col mt-2">
                <label for="nisn" class="text-xs mb-1">NISN Siswa</label>
                <x-form.input.text name="nisn" wire:model.live.debounce="nisn" placeholder="NISN" />
            </div>

            <button class="bg-sky-600 text-center text-white py-2 rounded-md mt-3 w-full" type="submit">
                Simpan
            </button>
        </form>

        @if ($mode == 'edit-form')
            <div class="flex pt-2 gap-1 text-slate-500">
                <a href="#" wire:click.prevent="backMode" style="text-decoration: none;">Kembali
                    ke tambah siswa</a>
                <span data-lucide="arrow-up-right" width="13"></span>
            </div>
        @endif

    </div>
</div>
