"use strict";

//TOP AT PAGE LOAD
window.onbeforeunload = () => {
    window.scrollTo(0, 0);
}

//HELP OVERLAY CONTROLS
let overlay = false;
const ol = document.getElementById("help_overlay");

const open_help = () => {
    if (!overlay) {
        ol.style.display = "flex";
        setTimeout(function () {
            ol.style.height = "100%";
            ol.style.opacity = "1";
        }, 50);
        overlay = true;
    } else {
        ol.style.opacity = "0";
        ol.style.height = "0";
        setTimeout(function () {
            ol.style.display = "none";
        }, 350);
        overlay = false;
    }
};

document.querySelector("#help_h4").addEventListener("click", open_help);
document.querySelector("#help_close_button").addEventListener("click", open_help);

//SCROLLS TO SECTIONS
const toLogin = (event) => {
    if(event == "register_close") {
    document.getElementById("main_login_section_container").scrollIntoView({
        behavior: "instant",
        block: "start",
        inline: "start"
    })
} else {
    document.getElementById("main_login_section_container").scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "start"
    })
}
};

document.getElementById("call_to_action_h4").addEventListener("click", toLogin);
document.getElementById("nav_login").addEventListener("click", toLogin);

const action_container = document.getElementsByClassName("action_container_button");

for (var i = 0; i < action_container.length; i++) {
    action_container[i].addEventListener('click', toLogin);
}

const toAbout = () => {
    document.getElementById("main_header").scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "start"
    })
};

document.getElementById("nav_about").addEventListener("click", toAbout);

const toContact = () => {
    document.getElementById("main_footer").scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "start"
    })
};

document.getElementById("nav_contact").addEventListener("click", toContact);

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

// MOBILE MENU HANDLING
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
}

document.querySelector("#burger").addEventListener("click", menuAction);
document.querySelector("#overlay_menu_about").addEventListener("click", toAbout);
document.querySelector("#overlay_menu_log").addEventListener("click", toLogin);
document.querySelector("#overlay_menu_contact").addEventListener("click", toContact);
const overlay_h2 = document.querySelectorAll(".overlay_menu_h2");

for(let i = 0; i < overlay_h2.length; i++) {
    overlay_h2[i].addEventListener("click", menuAction);
}

//General overlay controls
let generalOverlay = false;

const overlayControl = () => {
    if (!generalOverlay) {
        document.querySelector(".general_overlay").style.display = "flex";
        setTimeout(function () {
            document.querySelector(".general_overlay").style.opacity = "1";
        }, 50);
        generalOverlay = true;
    } else {
        document.querySelector(".general_overlay").style.opacity = "0";
        setTimeout(function () {
            document.querySelector(".general_overlay").style.display = "none";
        }, 500);
        generalOverlay = false;
    }
}

document.querySelector("#close_general_overlay").addEventListener("click", overlayControl);
document.querySelector("#tos").addEventListener("click", overlayControl);
const footer_p_overlay = document.querySelectorAll(".footer_p");

for(let i = 0; i < footer_p_overlay.length; i++) {
    footer_p_overlay[i].addEventListener("click", overlayControl);
}

//Register form controls
let registerOverlay = false;

const registerControl = () => {
    if (!registerOverlay) {
        document.querySelector("#register_overlay").style.display = "flex";
        document.querySelector("#register_overlay").style.height = "100%";
        setTimeout(function () {
            document.querySelector("#register_overlay").style.opacity = "1";
        }, 50);
        registerOverlay = true;
    } else {
        document.querySelector("#register_overlay").style.opacity = "0";
        setTimeout(function () {
            document.querySelector("#register_overlay").style.display = "none";
            document.querySelector("#register_overlay").style.height = "0";
        }, 500);
        registerOverlay = false;
    }
}

document.querySelector("#register_open").addEventListener("click", registerControl);
document.querySelector("#register_close").addEventListener("click", registerControl);

/* FEATURE HOVER */
let feature_mouse = false;

const feature_overlay = (el) => {
    const overlay_first = document.getElementsByClassName("action_container");

    if(!feature_mouse) {
        for(let i = 0; i < overlay_first.length; i++) {
            if(el != overlay_first[i]) {
            overlay_first[i].classList.add("grayscale");
        }
    }
        feature_mouse = true;    
    } else {
        for(let j = 0; j < overlay_first.length; j++) {
            overlay_first[j].classList.remove("grayscale");
    }
        feature_mouse = false;
    }
}


