import { Swiper } from "swiper";
import { Scrollbar, Autoplay, } from "swiper/modules";

document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector(".slide-welcome")) {
    new Swiper(".slide-welcome", {
      modules: [Scrollbar, Autoplay],
      grabCursor: true,
      loop: true,
      // autoplay: {
      //   delay: 2500,
      //   disableOnInteraction: true,
      // },
      scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
      },
    });
  }
});


