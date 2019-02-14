"use strict";

//Top at load
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


//LOGIN CHECK
let alert = false;

const input_check = () => {
    const username = document.getElementById("user_name").value;
    const password = document.getElementById("user_password").value;
    console.log(username);
    console.log(password);
    if (username == "placeholder" && password == "placeholder") {
        window.open("https://www.google.com", "_self");
    } else if (alert) {
        document.getElementById("alert").style.display = "none";
        alert = false;
    } else {
        document.getElementById("alert").style.display = "flex";
        alert = true;
    }
};

document.querySelector("#alert_close_button").addEventListener("click", input_check);


//SCROLLS TO SECTIONS
const toLogin = () => {
    document.getElementById("main_login_section_container").scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "start"
    })
};

document.getElementById("call_to_action_h4").addEventListener("click", toLogin);
document.getElementById("nav_login").addEventListener("click", toLogin);



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
    if (window.pageYOffset > 100) {
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
}

document.querySelector("#burger").addEventListener("click", menuAction);


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
