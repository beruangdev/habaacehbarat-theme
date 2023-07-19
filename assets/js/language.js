import { setLS, getLS } from "./libs/local-storage.js";
let selectEl = document.querySelector(`select[id="language"]`);
if (selectEl) {
    let datals = localStorage.getItem("fat:language");
    if (datals) {
        selectEl.querySelectorAll("option").forEach((op) => {
            if (datals == op.value) {
                op.selected = true;
            }
        });
    } else {
        localStorage.setItem("fat:language", "id");
    }

    if (!getLS("userLocation")) {
        console.log("GET USER LOCATION FROM API");
        // fetch("https://ipapi.co/json")
        fetch("https://ipinfo.io/json?token=575b3e988f8efc")
            .then((resp) => resp.json())
            .then((res) => {
                setLS("userLocation", res, 60 * 24 * 7 * 2);
            });
    }
}
