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

/*PLACEHOLDER CHART */
let placeholder_array = [680, 790, 770, 990, 1090, 1230, 1280, 1010, 880, 550, 1340, 1220];
Chart.defaults.global.animation.duration = 5000;
Chart.defaults.global.defaultFontSize = 13;
const ctx = document.getElementById('placeholderChart').getContext("2d");
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            data: placeholder_array,
            backgroundColor: [
                'rgba(250, 120, 0, 0.5)',
                'rgba(225, 110, 50, 0.5)',
                'rgba(200, 100, 100, 0.5)',
                'rgba(175, 90, 150, 0.5)',
                'rgba(150, 80, 200, 0.5)',
                'rgba(125, 70, 250, 0.5)',
                'rgba(100, 160, 0, 0.5)',
                'rgba(75, 50, 100, 0.5)',
                'rgba(50, 40, 50, 0.5)',
                'rgba(25, 30, 100, 0.5)',
                'rgba(0, 20, 250, 0.5)',
                'rgba(0, 10, 200, 0.5)'
            ],
        }]
    },
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true,
                    display: false
                },
                gridLines: {
                    color: "rgba(0, 0, 0, 0)",
                    display: false,
                    gridLineWidth: 0

                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    display: false
                },
                gridLines: {
                    gridLineWidth: 0,
                    display: false,
                    color: "rgba(0, 0, 0, 0)"
                }
            }]
        },
        responsive: true
    }
});

/* CHARTS */
/*
let placeholder_value1 = 120;
let placeholder_value2 = 1300;
let placeholder_array = [680, 790, 770, 990, 1090, 1230, 1280, 1010, 880, 550, 1340, 1220];
let chart = document.getElementById("sportChart").getContext("2d");
Chart.defaults.global.animation.duration = 5000;
Chart.defaults.global.defaultFontSize = 13;

const co2Chart = new Chart(chart, {
    type: "bar",
    data: {
        labels: ["RUNNING", "CAR"],
        datasets: [{
            label: "GRAMS OF Co2 EMISSISONS",
            data: [
                placeholder_value1, placeholder_value2
            ],
            backgroundColor: [
                "rgba(127, 255, 0, 0.8)",
                "rgba(40, 40, 40, 0.8)"
            ],
            borderWidth: 0,
            borderColor: "rgb(50, 50, 50)"
        }]
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
});

/*PLACEHOLDER CHART */
/*
const ctx = document.getElementById('placeholderChart');
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            data: placeholder_array,
            backgroundColor: [
                'rgba(250, 120, 0, 0.5)',
                'rgba(225, 110, 50, 0.5)',
                'rgba(200, 100, 100, 0.5)',
                'rgba(175, 90, 150, 0.5)',
                'rgba(150, 80, 200, 0.5)',
                'rgba(125, 70, 250, 0.5)',
                'rgba(100, 160, 0, 0.5)',
                'rgba(75, 50, 100, 0.5)',
                'rgba(50, 40, 50, 0.5)',
                'rgba(25, 30, 100, 0.5)',
                'rgba(0, 20, 250, 0.5)',
                'rgba(0, 10, 200, 0.5)'
            ],
        }]
    },
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true,
                    display: false
                },
                gridLines: {
                    color: "rgba(0, 0, 0, 0)",
                    display: false,
                    gridLineWidth: 0

                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    display: false
                },
                gridLines: {
                    gridLineWidth: 0,
                    display: false,
                    color: "rgba(0, 0, 0, 0)"
                }
            }]
        },
        responsive: true
    }
});*/