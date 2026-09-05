<?php 
session_start();

if (isset($_SESSION["tripid"])) {
    unset($_SESSION["tripid"]);
}
if (!isset($_SESSION["ID"])) { 
    header("Location: login.php");
}

if (isset($_SESSION["Committee"])) {
    $commitee = $_SESSION["Committee"];
} else {
    $committee = 0;
}

$command = "python ./getalltrips.py";
$output = trim(shell_exec($command));
$trips = explode("\n", $output);
if ($trips[0] == "None") {
    $tripsempty = 0;
} else {
    $tripsempty = 1;
}
?>
    
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="trips.css">
    <title>University Of Surrey Mountaineering</title>
    </head>
    <body>
        
        <header class = "Banner">
            <div><img src="Photos/edited-photo.png"></div>
            <div></div>
            <div class="login"><button onclick="location.href = 'login.php'">login</button></div>
        </header>
        <?php if ($tripsempty): ?>
            <?php foreach ($trips as $index => $counter): ?>
            
                <?php 
                $tripid = $counter[1];
                $strarr = explode("'", $counter);
                echo $counter;
                $tripname = $strarr[1];
                $tripdate = $strarr[3];

                ?>

                <div>
                    <h1>Upcoming trips</h1>
                    <div>
                        <form action="trip.php" method="post">
                            <a href = "" onclick="tripclick()">
                                test

                            </a>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No trips</p>
        <?php endif; ?>
        
    </body>

    <script>
        tripclick(){
            <? $_SESSION['tripid'] = "0" ?>
        };
    </script>
</html>