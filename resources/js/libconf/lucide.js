// lucide library
import {
    createIcons,
    ArrowUpRight,
    UserRound,
    Trash,
    Pencil
} from 'lucide';

// mengapa diperlukan?, biar ter-reload secara penuh di livewire
const initializeLucide = () => {
    if (typeof createIcons === 'function') {
        // define icons
        createIcons({
            icons: {
                // list icon yang dibutuhkan
                ArrowUpRight,
                UserRound,
                Trash,
                Pencil
            }
        });
    }
};

initializeLucide();

// document.addEventListener('DOMContentLoaded', initializeLucide);

// listener. saat livewire melakukan navigasi, inisialisasi ulang function initalizeLucide
document.addEventListener('livewire:navigated', initializeLucide);
// sama, namun ini diterapkan pada seluruh komponen
Livewire.hook('morph.updated', () => {
    // menambahkan delay minimal 1ms untuk memastikan DOM sudah stabil setelah morphing Livewire
    setTimeout(initializeLucide, 1);
});
