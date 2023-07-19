// import { Swiper } from "swiper";
// import { FreeMode, Scrollbar } from "swiper/modules";

document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector(".slide-berita-utama")) {
    new Swiper(".slide-berita-utama", {
      modules: [SwiperModules.FreeMode, SwiperModules.Scrollbar],
      slidesPerView: 2.15,
      spaceBetween: 10,
      freeMode: true,
      scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
      },
      breakpoints: {
        768:{
          slidesPerView: 6.2,
          spaceBetween: 10,
        }
      }
    });
  }
});


