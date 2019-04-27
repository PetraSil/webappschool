"use strict";

//TOP AT PAGE LOAD
window.onbeforeunload = () => {
    window.scrollTo(0, 0);
}

/* SCROLL TO FUNCTIONS */
const toContact = () => {
    document.getElementById("main_footer").scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "start"
    })
};

document.getElementById("nav_contact").addEventListener("click", toContact);

const toMusic = () => {
    document.getElementById("music_bottom").scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "start"
    })
};

document.getElementById("nav_music").addEventListener("click", toMusic);
document.getElementById("overlay_menu_music").addEventListener("click", toMusic);

const toHome = () => {
    window.location.href = "login.html";
};

document.getElementById("nav_home").addEventListener("click", toHome);
document.getElementById("overlay_menu_home").addEventListener("click", toHome);

//NAVBAR BACKGROUND HANDLING
const navbar = document.getElementById("navbar_desktop");

const scrollBar = () => {
    if (window.pageYOffset > 50) {
        navbar.classList.add("navbar_background");
    } else {
        navbar.classList.remove("navbar_background");
    }
};

window.addEventListener("scroll", scrollBar);


// Mobile menu handling
let menu_toggle = false;

const menuAction = () => {

    const menu = document.querySelector("#overlay_menu");
    const menu_lines = document.getElementsByClassName("menu_lines");

    if (!menu_toggle) {
        menu.style.display = "flex";
        setTimeout(function () {
            menu.style.opacity = "1";
        }, 50);
        menu_toggle = true;
        for (let i = 0; i < menu_lines.length; i++) {
            menu_lines[i].style.backgroundColor = "rgb(233, 233, 233)";
        }
        document.getElementById("line1").classList.add("menu_line_effect1");
        document.getElementById("line3").classList.add("menu_line_effect3");
        document.getElementById("line2").style.opacity = "0";

    } else {
        menu.style.opacity = "0";
        setTimeout(function () {
            menu.style.display = "none";
        }, 200);
        menu_toggle = false;
        for (let i = 0; i < menu_lines.length; i++) {
            menu_lines[i].style.backgroundColor = "rgb(32, 32, 32)";
        }
        document.getElementById("line1").classList.remove("menu_line_effect1");
        document.getElementById("line3").classList.remove("menu_line_effect3");
        document.getElementById("line2").style.opacity = "1";
    }
};

document.querySelector("#burger").addEventListener("click", menuAction);
const overlay_h2 = document.querySelectorAll(".overlay_menu_h2");

for(let i = 0; i < overlay_h2.length; i++) {
    overlay_h2[i].addEventListener("click", menuAction);
};

// NAV SITEMAP HANDLING
let sitemap = false;

const sitemapHandle = () => {
    if(!sitemap && window.innerWidth < 801) {
        document.getElementById("site_map_overlay").style.width = "100vw";
        document.getElementById("site_map_overlay").style.top = "0";
        setTimeout(function () {
            document.getElementById("site_map_overlay").style.opacity = "0.99";
        }, 100);
        sitemap = true;
    }
    else if (!sitemap) {
        document.getElementById("site_map_overlay").style.width = "20rem";
        setTimeout(function () {
            document.getElementById("site_map_overlay").style.opacity = "0.99";
        }, 100);
        sitemap = true;
    } else {
        document.getElementById("site_map_overlay").style.width = "0";
        document.getElementById("site_map_overlay").style.opacity = "0";   
        sitemap = false;
    }
};

document.getElementById("nav_site").addEventListener("click", sitemapHandle);
document.getElementById("overlay_menu_contact").addEventListener("click", toContact);
document.getElementById("overlay_menu_site").addEventListener("click", sitemapHandle);

/* CLOSE MENU IF CLICKING OUTSIDE */
window.addEventListener("mouseup", function (event) {
    const menu = document.getElementById("site_map_overlay");
    const nav_site = document.getElementById("nav_site");
    const nav_site_h5 = document.getElementById("nav_site_h5");
    if (sitemap == true && event.target != menu && event.target != menu && event.target != nav_site && event.target != nav_site_h5) {
        document.getElementById("site_map_overlay").style.width = "0";
        document.getElementById("site_map_overlay").style.opacity = "0";   
        sitemap = false;
    }
});