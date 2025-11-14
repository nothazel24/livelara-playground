{{-- inisialisasi properti --}}
@props(['name'])

{{-- 

$name diambil secara dinamis dari component/tag sebelumnya, & $attributes adalah variabel bawaan blade untuk menampung semua data setelah name 

--}}
<input type="text" name="{{ $name }}" {{ $attributes }} class="form-control mb-2" required />

{{-- Dynamic error --}}
@error($name)
    <span class="small d-block text-danger mt-1">{{ $message }}</span>
@enderror
