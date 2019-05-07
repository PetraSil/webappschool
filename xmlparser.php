<?php
    //reading the xml file
    $mytrackinfo = simplexml_load_file('xml/kalliotoolo.xml');
    //parsing the xml file
    $distance= $mytrackinfo->{'calendar-items'}[0]->exercise->result->distance;
    $avhrdata= $mytrackinfo->{'calendar-items'}[0]->exercise->result->samples->sample[0]->values;
    $speeddata= $mytrackinfo->{'calendar-items'}[0]->exercise->result->samples->sample[1]->values;
    $altitudedata= $mytrackinfo->{'calendar-items'}[0]->exercise->result->samples->sample[2]->values;
    $distancedata= $mytrackinfo->{'calendar-items'}[0]->exercise->result->samples->sample[3]->values;


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

    //formatting timepoints to hour/min/sec
    $timeformat=[];
    $i=0;
    foreach($timepoints as $val){
        array_push($timeformat, gmdate("H:i:s", $val));
    };
  

    

    //print_r($graph_array);

    
    $timepoints=[];
    for ($i=0; $i<sizeof($hrArray);$i++){
        array_push($timepoints, $i*5);
    }

    //calculating data

    $maxHR=max($hrArray);
    $minHR=min($hrArray);

    $averagehr=number_format(array_sum($hrArray)/(sizeof($hrArray)-1),0);
    $avspeed=number_format(($distanceArray[$qtyOfEmbryos]/1000)/($timepoints[$qtyOfEmbryos]/3600),2);
    $highspeed=number_format(max($speedArray),2);

    $totaldistance=number_format($distanceArray[$qtyOfEmbryos],0,","," ");

    $ascension=0;
    $descension=0;

    for ($i=1;$i<sizeof($altitudeArray);$i++){
        $result=($altitudeArray[$i] - $altitudeArray[$i-1]);
       
        if($result<0){
            //descension
            $desc=$desc-$result;          
        }else{
            //ascension
            $asc=$asc+$result;
        };
    };

    $deltah=(max($altitudeArray)-min($altitudeArray));
    $ascension=number_format($asc,0);
    $descension=number_format($desc,0);
    $g=2;
    $calc=$altitudeArray[$g-1];
    $delta=$altitudeArray[1]-$altitudeArray[0];
    
   ?> 