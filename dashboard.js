"use strict";

//TOP AT PAGE LOAD
window.onbeforeunload = () => {
    window.scrollTo(0, 0);
}



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
}

document.querySelector("#burger").addEventListener("click", menuAction);


/* DASHBOARD SCROLL FUNCTIONS */

const toContact = () => {
    document.getElementById("main_footer").scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "start"
    })
};

document.getElementById("nav_contact").addEventListener("click", toContact);


const toMusic = () => {
    document.getElementById("dashboard_music").scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "start"
    })
};

document.getElementById("nav_music").addEventListener("click", toMusic);


const toProfile = () => {
    document.getElementById("dashboard_profile").scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "start"
    })
};

document.getElementById("nav_profile").addEventListener("click", toProfile);


const toCalendar = () => {
    document.getElementById("dashboard_calendar").scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "start"
    })
};

document.getElementById("nav_calendar").addEventListener("click", toCalendar);


/*CURRENT DAY*/
const day = () => {
    const target = document.getElementById("weekday");
    const day = new Date();
    var weekday = day.getDay()
    if(weekday == 1) {
        target.innerHTML = "monday";
    } else if(weekday == 2) {
        target.innerHTML = "tuesday";
    } else if(weekday == 3) {
        target.innerHTML = "wednesday";
    } else if(weekday == 4) {
        target.innerHTML = "thursday";
    } else if(weekday == 5) {
        target.innerHTML = "friday";
    } else if(weekday == 6) {
        target.innerHTML = "saturday";
    } else {
        target.innerHTML = "sunday";
    }
}

window.addEventListener("load", day);


/* BAR CHART */
let chart = document.getElementById("sportChart").getContext("2d");
Chart.defaults.global.animation.duration = 5000;
Chart.defaults.global.defaultFontSize = 13;

const co2Chart = new Chart(chart, {
    type: "bar",
    data: {
        labels: ["RUNNING", "CAR"],
        datasets: [
            {
                label: "GRAMS OF Co2 EMISSISONS",
                data: [
                    120, 1300
                ],
                backgroundColor: [
                    "rgba(127, 255, 0, 0.8)",
                    "rgba(40, 40, 40, 0.8)"
                ],
                borderWidth: 0,
                borderColor: "rgb(50, 50, 50)"
            }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        legend: {
            display: false,
            labels: {
                display: false
            }
        },
        title: {
            display: true,
            text: ["GRAMS OF CO2 EMISSIONS", "FOR A DISTANCE OF 10KM"],
            fontSize: 20,
            fontStyle: 400
        },
        responsive: false
    }
}
)