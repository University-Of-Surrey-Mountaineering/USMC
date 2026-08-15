<?php 

session_start();

$ID = $_SESSION["ID"];
$username = $_SESSION["Username"];
$command = "python ./retrieveuserdetails.py " . $ID;
$output = trim(shell_exec($command));
$out = explode("\n", $output);

$forename = $out[0];
$surname = $out[1];
$commitee = $out[2];
$email_address = $out[3];

try {
    $pfp = $out[4];
}
catch (Exception $e) {
    $pfp = "Photos/000099290029.jpg";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="user.css">
  <title>University Of Surrey Mountaineering</title>
</head>
<body>
    
    <header class = "Banner">
        <div><img src="Photos/edited-photo.png"></div>
        <div></div>
        <div class="login"><button onclick="location.href = 'login.php'">login</button></div>
    </header>

    <div class="container">
        <div></div>

        <div class = "member_details">
        
            <a class = "pfp_container" href="">
                <div id = "pfp">
                </div>
            </a>


            <div class = "details">
                <p> Username: 
                    <?php echo $username;?>
                </p>
                <p> Name: 
                    <?php echo $forename . " " . $surname;?>
                </p>
                <p> Email Address: 
                    <?php echo $email_address;?>
                </p>
            </div>

            <style>
                #pfp {
                    justify-content: center;
                    height:20vh;
                    width:10vw;
                    background-image: url(<?php echo $pfp;?>);
                    border-radius: 50%;
                    background-position: center;
                    background-size: auto 20vh;
                    background-repeat: no-repeat;
                }

            </style>

        </div>

        <div></div>
    </div>
    

</body>
</html>

