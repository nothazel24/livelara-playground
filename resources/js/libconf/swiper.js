import Swiper from 'swiper';
import { Autoplay } from 'swiper/modules';

import 'swiper/css/bundle';

function initializeSwiper() {
    const swiperElement = document.querySelector('.swiper');

    // swiperElement.swiper mencegah inisialisasi 2x sehingga menyebabkan duplikasi dan errornya program
    if (swiperElement) {
        new Swiper(swiperElement, {
            modules: [Autoplay],
            speed: 20000, // semakin besar, semakin lambat btw
            loop: true,
            // slidesPerView: 4, // max komponen yang ditampilkan per view
            // spaceBetween: 30, // jarak antar komponen
            autoplay: {
                delay: 0,
                disableOnInteraction: true,
                pauseOnMouseEnter: true // pause slide ketika hovering
            },
            freeMode: {
                enabled: true,
                momentum: false // agar slides tidak berhenti (infinite marquee)
            }
        });
    }
}


document.addEventListener('DOMContentLoaded', initializeSwiper);

// panggil ketika livewire selesai bernavigasi (IMPORTANT THINGS FOR ADDING THIS COMPONENT TO OTHER COMPONENTS)
document.addEventListener('livewire:navigated', () => {
    initializeSwiper();
});