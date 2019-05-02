window.onload = function () {

var chart = new CanvasJS.Chart("hrGraphContainer", {
animationEnabled: true,
title: {
    text: "Heart-rate over time"
},
axisY: {
    title: "Heart-rate (bpm)"
},
data: [{
    type: "area",
    color: "#003355",
    dataPoints: <?php echo json_encode($hrGraph_array, JSON_NUMERIC_CHECK); ?>
}]
});
chart.render();

var chart = new CanvasJS.Chart("altitudeGraphContainer", {
animationEnabled: true,   
title: {
    text: "Altitude"
},
axisY: {
    title: "Altitude (m)"
},
data: [{
    type: "area",
    color: "#6b655a",
    dataPoints: <?php echo json_encode($altitudeGraph_array, JSON_NUMERIC_CHECK); ?>
}]
});
chart.render();

var chart = new CanvasJS.Chart("speedGraphContainer", {
animationEnabled: true,
title: {
    text: "Speed over time"
},
axisY: {
    title: "Speed (km/h)"
},
data: [{
    type: "line",
    dataPoints: <?php echo json_encode($speedGraph_array, JSON_NUMERIC_CHECK); ?>
}]
});
chart.render();

var chart = new CanvasJS.Chart("SpeednAltGraphContainer", {
animationEnabled: true,
title: {
    text: "Speed vs altitude"
},
axisY: {
    title: "Speed (km/h)/ altitude (m)"
},
data: [
    {
    type: "line",
    color:"#88aaaa",
    dataPoints: <?php echo json_encode($speedGraph_array, JSON_NUMERIC_CHECK); ?>
},
{
    type: "area",
    color: "#6b655a",
    dataPoints: <?php echo json_encode($altitudeGraph_array, JSON_NUMERIC_CHECK); ?>
}]});
chart.render();

}
