<!doctype html>
<html lang="fi">

<head>
	<link rel="stylesheet" href="css/stylebackup1.css">
	<link rel="stylesheet" href="css/mapcss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRAPHING</title>
</head>

  
<body>

<?php

    $mytrackinfo = simplexml_load_file('tvmastolenkki.xml');
    $seed = $mytrackinfo;
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
    $graph_array = array();
    $i=0;
    foreach($hrArray as $val){
        array_push($graph_array, array("y" => $val, "label" => 5*($i++)));
    }

    $qtyOfEmbryos=sizeof($hrArray)-1;

    $timepoints=[];
    for ($i=0; $i<sizeof($hrArray);$i++){
        array_push($timepoints, $i*5);
    }
  
    $averagehr=array_sum($hrArray)/(sizeof($hrArray)-1);
    $avhrfromfile=$mytrackinfo->{'calendar-items'}[0]->exercise->result->{'heart-rate'}->average;
    $avspeed=

    echo "Average hr calculated is $averagehr<br>";
    echo "Average heart-rate from file is $avhrfromfile<br>";
    echo "Distance you traveled is $distanceArray[$qtyOfEmbryos]<br>";

    //print_r($graph_array);

    
    $timepoints=[];
    for ($i=0; $i<sizeof($hrArray);$i++){
        array_push($timepoints, $i*5);
    }
  
   ?> 

    <script>
        window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
        title: {
            text: "Time (s)"
        },
        axisY: {
            title: "Heart-rate"
        },
        data: [{
            type: "line",
            dataPoints: <?php echo json_encode($graph_array, JSON_NUMERIC_CHECK); ?>
        }]
        });
        chart.render();

        }
    </script>

    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>                        

</body>
</html>
