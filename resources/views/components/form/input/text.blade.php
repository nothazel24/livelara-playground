{{-- inisialisasi properti --}}
@props(['name'])

{{-- 

$name diambil secara dinamis dari component/tag sebelumnya, & $attributes adalah variabel bawaan blade untuk menampung semua data setelah name 

--}}
<input type="text" name="{{ $name }}" {{ $attributes }}
    class="border border-slate-500 rounded-md py-1 px-2 mb-2 focus:outline-none focus:ring-2 focus:ring-slate-400" required />

{{-- Dynamic error --}}
@error($name)
    <span class="text-xs text-red-600 mt-0.5">{{ $message }}</span>
@enderror
