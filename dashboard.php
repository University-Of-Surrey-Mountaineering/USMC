<?php

session_start();
$background_image = "Photos/IMG_0943.JPG";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dashboard.css">
  <title>University Of Surrey Mountaineering</title>
</head>
<body>
    
    <header class = "Banner">
        <div><img src="Photos/edited-photo.png"></div>
        <div></div>
        <div class="login"><button onclick="location.href = 'login.php'">login</button></div>
    </header>

    <div class="container">
        <div class="section">

            <div></div>

            <div class="next_trip">
                
                <a>
                    gggg
                    <style>
                        .next_trip a {
                            margin: 5vh;
                            grid: flex;
                            justify-content: center;
                            justify-items: center;
                            background-color: white;
                            height: 50vh;
                            width: 50vw;
                            background:url(<?php echo $background_image;?>);
                            background-repeat: no-repeat;
                            background-size: 100% 100%;
                            border-radius: 20px;
                        }
                    </style>
                </a>

            </div>

            <div></div>

        </div>
        
    </div>

</body>
</html>