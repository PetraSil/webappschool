<?php
session_start();
if(isset($_POST["user_name"]))
$_SESSION["session_username"] = $_POST["user_name"];
?>

<!doctype html>
<html lang="en">

<head>
	<link rel="stylesheet" href="css/stylebackup1.css">
	<link rel="stylesheet" href="css/mapcss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRAPHING</title>
</head>

  
<body>
<h2>This section is a placeholder and under development. It represents an example of data and one of the presentation types used in the application, 
    so the look and the feel of this section will most likely be changed for the final product.</h2>
    <button type="button" id="close_data_overlay_charts">RETURN</button>
<?php
    //reding the xml file
    $mytrackinfo = simplexml_load_file('xml/kalliotoolo.xml');
    //parsing the xml file
    $distance= $mytrackinfo->{'calendar-items'}[0]->exercise->result->distance;
    $avhrdata= $mytrackinfo->{'calendar-items'}[0]->exercise->result->samples->sample[0]->values;
    $speeddata= $mytrackinfo->{'calendar-items'}[0]->exercise->result->samples->sample[1]->values;
    $altitudedata= $mytrackinfo->{'calendar-items'}[0]->exercise->result->samples->sample[2]->values;
    $distancedata= $mytrackinfo->{'calendar-items'}[0]->exercise->result->samples->sample[3]->values;


    //error_reporting(E_ALL);

    //arraying parsed, comma separated strings of values
    $hrArray = explode(',', $avhrdata);
    $speedArray = explode(',', $speeddata);
    $distanceArray = explode(',', $distancedata);
    $altitudeArray = explode(',', $altitudedata);

    //generating arrays with parsed values assigned with key "y" and timepoint values (every 5 seconds) with key "x"
    $hrGraph_array = array();
    $i=0;
    foreach($hrArray as $val){
        array_push($hrGraph_array, array("y" => $val, "label" => gmdate("H:i:s",5*($i++))));
    }

    $speedGraph_array = array();
    $i=0;
    foreach($speedArray as $val){
        array_push($speedGraph_array, array("y" => $val, "label" => gmdate("H:i:s",5*($i++))));
    }

    $altitudeGraph_array = array();
    $i=0;
    foreach($altitudeArray as $val){
        array_push($altitudeGraph_array, array("y" => $val, "label" => gmdate("H:i:s",5*($i++))));
    }

    //amount of embryos in array
    $qtyOfEmbryos=sizeof($hrArray)-1;

    //calculating time points (the measurement rate is every five seconds)
    $timepoints=[];
    for ($i=0; $i<sizeof($hrArray);$i++){
        array_push($timepoints, $i*5);
    };

    $timeformat=[];
    $i=0;
    foreach($timepoints as $val){
        array_push($timeformat, gmdate("H:i:s", $val));
    };


    
  
    $averagehr=array_sum($hrArray)/(sizeof($hrArray)-1);
    $avhrfromfile=$mytrackinfo->{'calendar-items'}[0]->exercise->result->{'heart-rate'}->average;
    $avspeed=($distanceArray[$qtyOfEmbryos]/1000)/($timepoints[$qtyOfEmbryos]/3600);
    

    echo "Average hr calculated is $averagehr<br> bpm";
    //echo "Average heart-rate from file is $avhrfromfile<br>";
    echo "Distance you traveled is $distanceArray[$qtyOfEmbryos] meters<br>";
    echo "Your average speed was $avspeed km/h<br>";


    //print_r($graph_array);

    
    $timepoints=[];
    for ($i=0; $i<sizeof($hrArray);$i++){
        array_push($timepoints, $i*5);
    }
  
   ?> 

    <script>
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

        
        const toData = () => {
        window.location.href = "data.php";
        };

        document.getElementById("close_data_overlay_charts").addEventListener("click", toData);

    </script>

    <div id="hrGraphContainer" style="height: 370px; width: 100%;"></div>
    <div id="SpeednAltGraphContainer" style="height: 370px; width: 100%;"></div>
    <div id="speedGraphContainer" style="height: 370px; width: 100%;"></div>
    <div id="altitudeGraphContainer" style="height: 370px; width: 100%;"></div>
    
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>                        

</body>
</html>
