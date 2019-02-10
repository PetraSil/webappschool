let myChart = document.getElementById("myChart").getContext("2d");

let heartChart = new Chart(myChart, {
    type: "line",
    data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [
            {
            label: "Average Heartbeat",
            lineTension: 0,
            borderWidth: 2,
            hoverBorderWidth: 3,
            borderColor: "rgb(20, 20, 20)",
            backgroundColor: "rgba(20, 200, 158, 0.8)",
            data: [
                145, 149, 187, 134, 190, 184, 134, 156, 172, 107, 111, 130]
            },
            {
                label: "Maximum Heartbeat",
                lineTension: 0,
                borderWidth: 2,
                hoverBorderWidth: 3,
                borderColor: "rgb(20, 20, 20)",
                backgroundColor: "rgba(255, 20, 15, 0.8)",
                data: [
                    159, 198, 207, 156, 199, 209, 154, 162, 182, 123, 144, 150]
            
            }
        ],
    },
});