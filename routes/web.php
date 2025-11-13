<?php

use Illuminate\Support\Facades\Route;

Route::prefix('')->name('home.')->group(function () {
    Route::get('/', App\Livewire\Pages\Home::class)->name('main');
    Route::get('/students', App\Livewire\Pages\Students::class)->name('students');
});
