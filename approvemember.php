<?php

session_start();
$ID = $_SESSION["ID"];
$out = "";
if (!isset($_SESSION["ID"])){
    header("Location: login.php");
}
else {
    $command = "python ./getapproverequests.py";
    $output = trim(shell_exec($command));
    $out = explode("\n", $output);
    $approvalid = $out[0];
    $memberid = $out[1];
    $requestphoto = $out[3];
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['accept']) > 0) {
        unset($_POST['accept']);
        $command = "python ./updaterequest.py " . $approvalid . " " . $ID . " " . $memberid . " " . $_POST['type'] . " " . "1";
        $output = trim(shell_exec($command));
        $out = explode("\n", $output);
        $out = $out[1];
    }
    elseif (isset($_POST['deny']) > 0) {
        unset($_POST['deny']);
        $command = "python ./updaterequest.py " . $approvalid . " " . $ID . " " . $memberid . " " . $_POST['type'] . " " . "1";
        $output = trim(shell_exec($command));
        $out = explode("\n", $output);
        $out = $out[1];
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="approvemember.css">
  <title>University Of Surrey Mountaineering</title>
</head>
<body>
    
    <header class = "Banner">
        <div><img src="Photos/edited-photo.png"></div>
        <div></div>
        <div class="login"><button onclick="location.href = 'login.php'">login</button></div>
    </header>

    <div>
        <div class="photo">
            <img id = "photo" src="Photos/IMG_0935.JPG">
        </div>

        <div class="submit">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
                
                <input type="radio" name = "type" value = "semester"> semester
                <input type="radio" name = "type" value="year"> year
                <br>
                <input type = "submit" name = "accept" value="accept"/>
                <input type= "submit" name = "deny" value="deny" />
            </form>
            <? echo $out
        </div>
    </div>

</body>
</html>