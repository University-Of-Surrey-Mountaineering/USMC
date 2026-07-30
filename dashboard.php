<?php


session_start();
$background_image = "Photos/IMG_0935.JPG";

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

                <p>ttttttttt</p>

                <style>
                    .next_trip {
                        background:url(<?php echo $background_image;?>);
                        background-size:cover;
                        width: auto;
                        height: auto;
                    }
                </style>

            </div>

            <div></div>

        </div>
        
    </div>

</body>
</html>