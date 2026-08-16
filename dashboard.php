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
$membercommand = "python ./retrievemembershipdetails.py " . $ID;
$memberoutput = trim(shell_exec($membercommand));
$memberout = explode("\n", $memberoutput);
$membernumber = $memberout[0];
$memberexp = $memberout[1];


try {
    $pfp = $out[4];
}
catch (Exception $e) {
    $pfp = "Photos/000099290029.jpg";
}

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

        <a class = "user_section" href = "user.php">
            <div></div>
            <div class="member_details">
                <div class = "pfp_container" href="">
                    <div id = "pfp"></div>

                </div>
                <div class = "user_details">
                    <p> Username: 
                    <?php echo $username;?>
                    </p>
                    <p>Name: 
                        <?php echo $forename . " " . $surname;?>
                    </p>
                    <p>Email Address: 
                        <?php echo $email_address;?>
                    </p>
                    <p>Membership Code:
                        <?php echo $membernumber;?>
                    </p>
                    <p>Expiry Date:
                        <?php echo $memberexp;?>
                    </p>
                </div>
            </div>
            <div></div>
            
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
        </a>
    
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