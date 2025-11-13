// sweetalert2 import
import Swal from 'sweetalert2';

// common notification
window.addEventListener('swal', event => {
    // console.log(event.detail)
    Swal.fire({
        title: event.detail.title,
        text: event.detail.text,
        icon: event.detail.type,
        // theme: 'dark',
        timer: 2000,
    });
});

// confirmation
window.addEventListener('swalConfirm', event => {
    // menampung data dari array yang dikembalikan
    const action = event.detail.action;
    const componentId = event.detail.componentId;

    Swal.fire({
        title: event.detail.title,
        html: "Apakah kamu ingin <strong>menghapusnya?<strong>",
        icon: event.detail.type,
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // memanggil function di komponen yang spesifik berdasarkan id
            if (componentId) {
                Livewire.find(componentId).call(action);
            } else {
                // panggil event secara langsung
                Livewire.dispatch(action)
            }
        }
    });
});