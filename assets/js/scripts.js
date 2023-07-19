import "./dark-mode.js";
import "flowbite";
import "./libs/helper.js";

import "./language.js";
import "./fingerprint.js";
import "./translate.js";

import { Swiper } from "swiper";
import { Scrollbar, Autoplay, FreeMode } from "swiper/modules";
window.Swiper = Swiper;
window.SwiperModules = {
    Scrollbar,
    Autoplay,
    FreeMode,
};
import "swiper/css";
import "swiper/css/scrollbar";

import "./slide/slide-welcome.js";
import "./slide/slide-berita-utama.js";

// import feather from "feather-icons";

window.onload = () => {
    // feather.replace();
};
