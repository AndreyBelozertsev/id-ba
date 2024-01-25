// import Swiper JS
import Swiper from 'swiper';
// import Swiper styles


import 'swiper/css';

import { Navigation, Pagination, FreeMode, Thumbs } from 'swiper/modules';


// swiper

const swiper1 = new Swiper('.swiper1', {
    modules: [Navigation],
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
});
  
const swiper = new Swiper(".mySwiper", {
    modules: [Navigation, FreeMode],
    spaceBetween: 30,
    slidesPerView: 'auto',
    freeMode: true,
    watchSlidesProgress: false,
});
const swiper2 = new Swiper(".mySwiper2", {
    modules: [Navigation, Pagination, Thumbs],
    spaceBetween: 10,
    thumbs: {
      swiper: swiper,
    },
});
  
  const swiper3 = new Swiper('.swiper3', {
    modules: [Navigation],
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
      nextEl: '.swiper3-button-next',
      prevEl: '.swiper3-button-prev',
    },
    breakpoints: {
      540: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1140: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
});
  
export function swiper4(){
  new Swiper('.swiper4', {
      modules: [Navigation],
      loop: false,
      spaceBetween: 50,
      slidesPerView: 1,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
}
swiper4();