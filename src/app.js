// Libraries
window.bootstrap = require("bootstrap/dist/js/bootstrap.bundle.js");

// Local Scripts
import "../src/smooth-scrolling";
import "../src/form-ajax";
import "../src/aos";
import "../src/search-input";
import "../src/swipers";
import "../src/modals";

// Function that closes menu
function cerrarMenu() {
    const menu = document.querySelector(".menu");
    const navbar = document.getElementById("navbar");
    const backdrop = document.getElementById("backdrop");

    if (menu) {
        menu.classList.remove("menu-abierto");
    }
    if (navbar) {
        navbar.classList.remove("opacity-0");
    }
    if (backdrop) {
        backdrop.classList.remove("backdrop-opacity-1");
    }
}

document.addEventListener("DOMContentLoaded", function () {
    // --- Header Scroll Effect ---
    const header = document.getElementById("navbar");
    if (header) {
        const updateScroll = () => {
            const scroll =
                window.pageYOffset || document.documentElement.scrollTop;
            if (scroll >= 1) {
                header.classList.add("navbar-scroll");
            } else {
                header.classList.remove("navbar-scroll");
            }
        };
        window.addEventListener("scroll", updateScroll);
        updateScroll(); // Run on page load
    }

    // --- Navigation Menu Open/Close Logic ---
    const mburger = document.getElementById("mburger");
    const menu = document.querySelector(".menu");
    const navbar = document.getElementById("navbar");
    const backdrop = document.getElementById("backdrop");

    if (mburger && menu && navbar && backdrop) {
        mburger.addEventListener("click", function (e) {
            e.stopPropagation();
            menu.classList.toggle("menu-abierto");
            navbar.classList.toggle("opacity-0");
            backdrop.classList.toggle("backdrop-opacity-1");
        });

        menu.addEventListener("click", function (e) {
            e.stopPropagation();
        });

        document.body.addEventListener("click", function () {
            // Only close if it's already open
            if (menu.classList.contains("menu-abierto")) {
                cerrarMenu();
            }
        });
    }

    const btnCerrarMenu = document.getElementById("cerrar-menu");
    if (btnCerrarMenu) {
        btnCerrarMenu.addEventListener("click", cerrarMenu);
    }

    // Note: ID should be 'btn-logo-menu' or similar, you have 'cerrar-menu' twice
    const btnLogo = document.getElementById("btn-logo");
    if (btnLogo) {
        btnLogo.addEventListener("click", cerrarMenu);
    }

    const btnContacto = document.getElementById("btn-contact");
    if (btnContacto) {
        btnContacto.addEventListener("click", cerrarMenu);
    }

    // Close menu with Esc key
    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
            cerrarMenu();
        }
    });

    // Get all top-level list items in the menu
    const navLiElements = document.querySelectorAll("#navmenu > li");

    // Loop through each top-level list item
    navLiElements.forEach((li) => {
        // Check if this list item has a submenu
        if (li.classList.contains("has-submenu")) {
            const link = li.querySelector("a"); // Get the link inside it

            link.addEventListener("click", function (event) {
                // On mobile/tablet, prevent the link from navigating and toggle the submenu
                if (window.innerWidth < 992) {
                    event.preventDefault();
                    li.classList.toggle("submenu-open");
                }
                // On desktop, the link will navigate as normal, and CSS hover handles the submenu
            });
        } else {
            // If it's a REGULAR list item (NO submenu), add the listener to close the whole menu on click.
            li.addEventListener("click", cerrarMenu);
        }
    });
});
