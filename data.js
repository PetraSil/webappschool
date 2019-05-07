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
    window.location.href = "music.php";
};

document.getElementById("menu_music").addEventListener("click", toMusic);

const toHome = () => {
    window.location.href = "login.php";
};

document.getElementById("nav_logout").addEventListener("click", toHome);
document.getElementById("overlay_menu_home").addEventListener("click", toHome);
document.getElementById("menu_home").addEventListener("click", toHome);
document.getElementById("logo_large").addEventListener("click", toHome);

const toDashboard = () => {
    window.location.href = "dashboard.php";
};

document.getElementById("menu_dashboard").addEventListener("click", toDashboard);

const toData = () => {
    document.getElementById("music_bottom").scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "start"
    });
};

document.getElementById("nav_data").addEventListener("click", toData);
document.getElementById("menu_data").addEventListener("click", toData);
document.getElementById("overlay_menu_data").addEventListener("click", toData);

const toHeart = () => {
    window.location.href = "trainingdata.php";
}

document.getElementById("data_meta3").addEventListener("click", toHeart);

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


//GENERAL OVERLAY CONTROLS
let generalOverlay = false;

const overlayControl = () => {
    if (!generalOverlay) {
        document.querySelector(".general_overlay").style.display = "flex";
        document.querySelector(".general_overlay").scrollTo(0, 0);
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
};

document.querySelector("#close_general_overlay").addEventListener("click", overlayControl);
const footer_p_overlay = document.querySelectorAll(".footer_p");

for(let i = 0; i < footer_p_overlay.length; i++) {
        footer_p_overlay[i].addEventListener("click", overlayControl);
};

/*PLACEHOLDER CHART */
/*Chart.Legend.prototype.afterFit = function() {
    this.height = this.height + 100;
};
let placeholder_array = [680, 790, 770, 990, 1090, 1230, 1280, 1010, 880, 550, 1340, 1220];
Chart.defaults.global.animation.duration = 2000;
Chart.defaults.global.defaultFontSize = 30;
const ctx = document.getElementById('placeholderChart').getContext("2d");
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        datasets: [
            {
            label: "Jan",
            data: [896],
            backgroundColor: 'rgba(0, 191, 255, 0.5)'
            },
            {
            label: "Feb",
            data: [687],
            backgroundColor: 'rgba(70, 130, 180, 0.5)'
            },
             {
            label: "Mar",
            data: [1044],
            backgroundColor: 'rgba(95, 158, 160, 0.5)'
            },
            {
            label: "Apr",
            data: [984],
            backgroundColor: 'rgba(123, 104, 238, 0.5)'
            },
            {
            label: "May",
            data: [1045],
            backgroundColor: 'rgba(65, 105, 225, 0.5)'
            },
            {
            label: "Jun",
            data: [1101],
            backgroundColor: 'rgba(176, 224, 230, 0.5)'
            },
            {
            label: "Jul",
            data: [1252],
            backgroundColor: 'rgba(135, 206, 250, 0.5)'
            },
            {
            label: "Aug",
            data: [1205],
            backgroundColor: 'rgba(100, 149, 237, 0.5)'
            },
            {
            label: "Sep",
            data: [469],
            backgroundColor: 'rgba(70, 130, 180, 0.5)'
            },
            {
            label: "Oct",
            data: [635],
            backgroundColor: 'rgba(106, 90, 205, 0.5)'
            },
            {
            label: "Nov",
            data: [807],
            backgroundColor: 'rgba(72, 61, 139, 0.5)'
            },
            {
            label: "Dec",
            data: [1050],
            backgroundColor: 'rgba(0, 0, 128, 0.5)'
            },
    ],
          
    },
    options: {
    
        title: {
            display: true,
            text: 'Minutes trained per month',
            fontSize: 50,
        },
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true,
                },
                gridLines: {
                    color: "rgba(0, 0, 0, 0)",
                    display: true,
                    gridLineWidth: 0

                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    display: true,
                },
                gridLines: {
                    gridLineWidth: 1,
                    display: true,
                    color: "rgba(0, 0, 0, 0)"
                }
            }],
        },
        responsive: true
    }
});
*/


/* DATA OVERLAYS */
let overlay_chart = false;

const dataOverlayHandle = () => {
    if(!overlay_chart) {
        document.getElementById("data_overlay_charts").style.width = "100%";
        document.getElementById("data_overlay_charts").style.display = "flex";
        document.getElementById("main_footer").style.display = "none";
        document.getElementById("music_main_container").style.display = "none";
        setTimeout(function () {
            document.getElementById("data_overlay_charts").style.opacity = "0.99";
        }, 200);
        overlay_chart = true;
    } else {
        document.getElementById("data_overlay_charts").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("data_overlay_charts").style.width = "0";
            document.getElementById("data_overlay_charts").style.display = "none";
        }, 200);
        document.getElementById("main_footer").style.display = "flex";
        document.getElementById("music_main_container").style.display = "block";
        overlay_chart = false;
    }
};

document.getElementById("data_meta2").addEventListener("click", dataOverlayHandle);
document.getElementById("close_data_overlay_charts").addEventListener("click", dataOverlayHandle);

/*
let overlay_calendar = false;

const calendarOverlayHandle = () => {
    if(!overlay_calendar) {
        document.getElementById("data_overlay_calendar").style.width = "100%";
        document.getElementById("data_overlay_calendar").style.display = "flex";
        document.getElementById("main_footer").style.display = "none";
        document.getElementById("music_main_container").style.display = "none";
        setTimeout(function () {
            document.getElementById("data_overlay_calendar").style.opacity = "0.99";
        }, 200);
        overlay_calendar = true;
    } else {
        document.getElementById("data_overlay_calendar").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("data_overlay_calendar").style.width = "0";
            document.getElementById("data_overlay_calendar").style.display = "none";
        }, 200);
        document.getElementById("main_footer").style.display = "flex";
        document.getElementById("music_main_container").style.display = "block";
        overlay_calendar = false;
    }
};

document.getElementById("data_meta5").addEventListener("click", calendarOverlayHandle);
document.getElementById("close_data_overlay_calendar").addEventListener("click", calendarOverlayHandle);

let overlay_options = false;

const optionsOverlayHandle = () => {
    if(!overlay_options) {
        document.getElementById("data_overlay_options").style.width = "100%";
        document.getElementById("data_overlay_options").style.display = "flex";
        document.getElementById("main_footer").style.display = "none";
        document.getElementById("music_main_container").style.display = "none";
        setTimeout(function () {
            document.getElementById("data_overlay_options").style.opacity = "0.99";
        }, 200);
        overlay_options = true;
    } else {
        document.getElementById("data_overlay_options").style.opacity = "0";
        setTimeout(function () {
            document.getElementById("data_overlay_options").style.width = "0";
            document.getElementById("data_overlay_options").style.display = "none";
        }, 200);
        document.getElementById("main_footer").style.display = "flex";
        document.getElementById("music_main_container").style.display = "block";
        overlay_options = false;
    }
};

document.getElementById("data_meta7").addEventListener("click", optionsOverlayHandle);
document.getElementById("close_data_overlay_options").addEventListener("click", optionsOverlayHandle);*/

/*ALERT*/
let alert = false;

const alertHandle = () => {
    if(!alert) {
        document.getElementById("alert").style.display = "flex";
        alert = true;
    } else {
        document.getElementById("alert").style.display = "none";
        alert = false;
    }
}

document.getElementById("alert_button").addEventListener("click", alertHandle);
document.getElementById("data_meta7").addEventListener("click", alertHandle);
document.getElementById("data_meta5").addEventListener("click", alertHandle);
document.getElementById("menu_application").addEventListener("click", alertHandle);
document.getElementById("menu_personal").addEventListener("click", alertHandle);
document.getElementById("overlay_menu_logout").addEventListener("click", alertHandle);

