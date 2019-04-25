<!doctype html>
<html lang="fi">

<?php  

$listitems=["Warmup","Basic cardio", "Medium intensity cardio", "Low intensity interval", "High intensity interval", "Insane intensity interval", "Flat zone spinning", "Hill climb spinning"];

?>


<head>
    <link rel="stylesheet" href="dragnsort.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRAGING N SORTING</title>
</head>

<body>

    <form action="dragnsort.php" method="post">
    <p>Name of the training block: <input type="text" name="name" /></p>
    <p>Upper limit <input type="text" name="upper" /></p>
    <p>Lower limit <input type="text" name="lower" /></p>
    <p>Heart rate <input type="Radio" name="hr" /></p>
    <p>Speed <input type="Radio" name="speed" /></p>
    <p>Cadence <input type="Radio" name="cadence" /></p>

    <p>Color <input type="color" name="color" /></p>
    

    <p><input type="submit" name="submit" value="Submit" /></p>
    </form>

    <?php 
        //pushes the submitted new 
        array_push($listitems, htmlentities($name=$_POST["name"]));

        $color=$_POST["color"];
        echo $color;

        $colors=array(
            "Warmup"=>"#88aaaa",
            "Basic cardio"=>"#ab8989",
            "Medium intensity cardio"=>"#ab89ab",
            "Low intensity interval"=>"#abab89",
            "High intensity interval"=>"#bbddcc",
            "Insane intensity interval"=>"#debdcd",
            "Flat zone spinning"=>"#cdbdde",
            "Hill climb spinning"=>"#446677"
        );

        $colors[htmlentities($name=$_POST["name"])]=$color;

        print_r($colors);


    ?>

    <div>
        <ul id="pickables" class="list-group-item">
            <?php
            foreach ($listitems as $item){
                echo "<li style='background-color:$colors[$item]'; draggable='true'> $item</li>\n";
            }
             ?>
            

       


    </div>

    <div>
        </ul>
            <p>Drag and build your sport profile here</p>
            <ul id="trainingprofile" class="list-group-item">

            </ul>

            </ul>
            <p>Drag here to delete!</p>
            <ul id="trashbin" class="list-group-item" ondrop="myFunction()">
        </ul>
    </div>

    <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="dragnsort.js"> </script>
</body>

</html>