<?php 

session_start();
$aboutmeout = "";
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
        
            <a class = "pfp_container" onclick="uploadpicture()">
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
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['pfpsubmit'] == 'pfpsubmit') {
        $test = $_POST['uploadedpfp'];
    }


    ?>
    <img src="<?php echo $test;?>"> 
    <div class="profilepicuploadcontainer" id = "pfpupload">
        <div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
                <input type="file" name = "uploadedpfp" accept=".jpg, .jpeg, .png">
                <input type="submit" name = "pfpsubmit" value = "pfpsubmit">
            </form>
        </div>
    </div>

    <?php if ($commitee == 1): ?>
        <?php 
        if (!isset($_POST['submit'])){
            $_POST['submit'] = "";
        }
        $command = "python ./committeerole.py " . $ID;
        $output = trim(shell_exec($command));
        $out = explode("\n", $output);
        $roles = $out[0];
        $aboutme = explode("'", $roles);
        $aboutme = $aboutme[1];

        if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['submit'] == 'Save') {
            $aboutme = test_input($_POST['aboutme']);
            $command = "python ./committeerole.py " . $ID . " " . $aboutme;
            $output = trim(shell_exec($command));
            $out = explode("\n", $output);
            $aboutmeout = $out[0];
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
    <?php endif; ?>


    <?php 
    $confirm = "";
    if (!isset($_POST['changedetails'])){
            $_POST['changedetails'] = "";
        }
    if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['changedetails'] == 'Submit') {
        $changeusername = test_input($_POST['username']);
        if (!(test_input($_POST['password']) == test_input($_POST['confirmpassword']))) {
            $confirm = "Your passwords dont match";
            $changepassword = "passwordsnull";
        }
        else {
            $changepassword = test_input($_POST['password']);
        }
        $changeemail = test_input($_POST['email']);

        if ($changeusername == "" and $changepassword == "" and $changeemail == ""){
            $confirm = "Please enter your details you would like to change";
        }
        elseif ($changepassword != "passwordsnull") {
            if ($changeusername == "") {
                $changeusername = "ifyouarereadingthisgoandfuckyourself,thereisnothingtoseehere.thislongassstringisheretoavoidnullerrors";
            }
            if ($changepassword == "") {
                $changepassword = "ifyouarereadingthisgoandfuckyourself,thereisnothingtoseehere.thislongassstringisheretoavoidnullerrors";
            }
            if ($changeemail == ""){
                $changeemail = "ifyouarereadingthisgoandfuckyourself,thereisnothingtoseehere.thislongassstringisheretoavoidnullerrors";
            }
            $command = "python ./changedetails.py " . $ID . " " . $changeusername . " " . $changepassword . " " . $changeemail;
            $output = trim(shell_exec($command));
            $out = explode("\n", $output);
            $confirm = $out[0];
            
        }
    }
    
    ?>
    <div class = "changedetailscontainer">
        <form class = "changedetails" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
            <p><?php echo $confirm; ?></p>
            <div>
                <label for="username">Change Username: </label>
                <input type="text" name="username">
            </div>
            <div>
                <label for = "password">Change Password: </label>
                <input type="password" name = "password">
            </div>
            <div>
                <label for="confirmpassword">Confirm Password: </label>
                <input type="password" name ="confirmpassword">
            </div>
            <div>
                <label for="email">Change email address: </label>
                <input type="email" name = "email">
            </div>
            
            <input type="submit" name = "changedetails" value = "Submit"/>
            
        </form>
    </div>
    <div id = "messageform" class = "messageform">
            <div></div>
            <div class = "test">
                <div class = "messagecontainer">
                    <?php if ($_POST['submit'] == 'Save'):?>
                        <div>
                            <p><?php echo $aboutmeout; ?></p>
                            <button onclick="location.href = 'userprocess.php'">OK</button>
                        </div>
                    <?php elseif ($_POST['changedetails'] == 'Submit'): ?>
                        <div>
                            <p><?php echo $confirm; ?></p>
                            <button onclick="location.href = 'userprocess.php'">OK</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>  
            <div></div>
    </div>
</body>


<script>
    onload = openmessage()
    function openmessage() {
        <?php if ($_POST['submit'] == 'Save' or $_POST['changedetails'] == 'Submit'): ?>
            document.getElementById("messageform").style.display = "grid";
        <?php endif; ?>
    }

    function uploadpicture() {
        document.getElementById("pfpupload").style.display = "flex";
    }

</script>

</html>

