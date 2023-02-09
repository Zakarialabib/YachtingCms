import './bootstrap';
import '../css/app.css'; 
import "../css/theme.css";
import "../css/select.css";
import "perfect-scrollbar/css/perfect-scrollbar.css";
import swal from 'sweetalert2';

import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'
import focus from "@alpinejs/focus";
import intersect from "@alpinejs/intersect";
import PerfectScrollbar from "perfect-scrollbar";

Alpine.plugin(focus);
Alpine.plugin(intersect);

window.PerfectScrollbar = PerfectScrollbar;

Alpine.data("mainState", () => {
    
    let lastScrollTop = 0;
    
    const init = function () {
        window.addEventListener("scroll", () => {
            let st =
                window.pageYOffset || document.documentElement.scrollTop;
            if (st > lastScrollTop) {
                // downscroll
                this.scrollingDown = true;
                this.scrollingUp = false;
            } else {
                // upscroll
                this.scrollingDown = false;
                this.scrollingUp = true;
                if (st == 0) {
                    //  reset
                    this.scrollingDown = false;
                    this.scrollingUp = false;
                }
            }
            lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
        });
    };

    const getTheme = () => {
        if (window.localStorage.getItem("dark")) {
            return JSON.parse(window.localStorage.getItem("dark"));
        }
        return (
            !!window.matchMedia &&
            window.matchMedia("(prefers-color-scheme: dark)").matches
        );
    };

    const RTL = () => {
        if (window.localStorage.getItem("rtl")) {
            return JSON.parse(window.localStorage.getItem("rtl"));
        }
        return false;
    };

    const enableTheme = (isRtl) => {
        if (isRtl) {
            document.body.dir = "rtl";
        } else {
            document.body.dir = "ltr";
        }
    };

    const setTheme = (value) => {
        window.localStorage.setItem("dark", value);
    };

    return {
        init,
        isDarkMode: getTheme(),
        toggleTheme() {
            this.isDarkMode = !this.isDarkMode;
            setTheme(this.isDarkMode);
        },
       isRtl : RTL(),
         toggleRtl() {
            this.isRtl = !this.isRtl;
            enableTheme(this.isRtl);
        },
        isSidebarOpen: window.innerWidth > 1024,
        isSidebarHovered: false,
        handleSidebarHover(value) {
            if (window.innerWidth < 1024) {
                return;
            }
            this.isSidebarHovered = value;
        },
        handleWindowResize() {
            if (window.innerWidth <= 1024) {
                this.isSidebarOpen = false;
            } else {
                this.isSidebarOpen = true;
            }
        },
        scrollingDown: false,
        scrollingUp: false,
    };
});

// Alpine.data("loadingMask", () => ({
//     pageLoaded: false,
//     init() {
//         window.onload = (event) => {
//             this.pageLoaded = true
//         };
//     }
// }));

Alpine.plugin(collapse)

window.Alpine = Alpine;

window.Swal = swal;

window.FilePond = FilePond

Alpine.start();

/* Function for dropdowns */
window.openDropdown = function openDropdown(event, dropdownID) {
  let element = event.target;
  while (element.nodeName !== "A") {
    element = element.parentNode;
  }
  Popper.createPopper(element, document.getElementById(dropdownID), {
    placement: "bottom-start",
  });
  document.getElementById(dropdownID).classList.toggle("hidden");
  document.getElementById(dropdownID).classList.toggle("block");

  if (dropdownID == 'nav-notification-dropdown') {
    fetch('/admin/user-alerts/seen')
  }
}