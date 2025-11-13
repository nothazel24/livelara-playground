<?php

namespace App\Livewire\Traits;

trait SwalAlert
{
    // display template untuk notifikasi standar
    public function dispatchSwal($type, $title, $text)
    {
        $this->dispatch(
            'swal',
            type: $type,
            title: $title,
            text: $text
        );
    }

    public function dispatchSwalConfirmation($type, $title, $action, $componentId = null)
    {
        $this->dispatch(
            'swalConfirm',
            type: $type,
            title: $title,
            //nama fungsi livewire yang akan dipanggil
            action: $action,
            // id konponen livewire saat ini
            componentId: $componentId,
            // menyimpan id siswa yang ingin dihapus
            id: $this->studentIdToDeleted
        );
    }

    // helper notifikasi sukses
    public function swalSuccess($title, $text)
    {
        $this->dispatchSwal('success', $title, $text);
    }

    // helper notifikasi error/gagal
    public function swalError($title, $text)
    {
        $this->dispatchSwal('error', $title, $text);
    }

    // helper notifikasi peringatan
    public function swalWarning($title, $text)
    {
        $this->dispatchSwal('warning', $title, $text);
    }

    // helper confirmation 
    public function swalConfirm($title, $action, $componentId = null)
    {
        // Mengambil ID komponen Livewire saat ini
        $componentId = $componentId ?? $this->getId();

        $this->dispatchSwalConfirmation('warning', $title, $action, $componentId);
    }
}
