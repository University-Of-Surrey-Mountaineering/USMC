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

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
                <p>Username: 
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


    <?php if ($commitee == 1): ?>
        <?php 
        $command = "python ./committeerole.py " . $ID;
        $output = trim(shell_exec($command));
        $out = explode("\n", $output);
        $roles = $out[0];
        $aboutme = explode("'", $roles);
        $aboutme = $aboutme[1];

        if ($_SERVER["REQUEST_METHOD"] == "POST" || $_POST['submit'] == "Save") {
            $aboutme = test_input($_POST['aboutme']);
            $command = "python ./committeerole.py " . $ID . " " . $aboutme;
            $output = trim(shell_exec($command));
            $out = explode("\n", $output);

            header("Location: userprocess.php");
        }
        ?>
        <form class = "whoami" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
            <label for="aboutme">Tell us about yourself:</label>
            <br>
            <textarea class = "input" type="text" name = "aboutme" maxlength="500" cols="50"
            rows="10"
            <?php if ($aboutme == ""): ?>
                placeholder = "Please Tell Us About Yourself"></textarea>
            <?php else: ?>
                ><?php echo $aboutme; ?> </textarea>
            <?php endif ?>
            <br>
            <input type="submit" name = "submit" value="Save">
        </form>

    
    <?php endif ?>
    

</body>
</html>

