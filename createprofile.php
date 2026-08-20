<?php

$username = "";
$password = "";
$confirm_password = "";
$forename = "";
$surname = "";
$email = "";

$confirm_error = "";


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $confirm_password = test_input($_POST["confirm_password"]);
    $forename = test_input($_POST["forename"]);
    $surname = test_input($_POST["surname"]);
    $email = test_input($_POST["email"]);

    if ($password != $confirm_password) {
        $confirm_error = "Your passwords don't match";
    }

    else {
        
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="createprofile.css">
  <title>University Of Surrey Mountaineering</title>
</head>
<body>
    <div class="container">
        <div></div>

        <div class = "cont">
            <h1>Create account</h1>
            <div class="create">
                <form id = "enter_details" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
                    <div>
                        <label for = "username">Username: </label>
                        <input type="text" id = "username" name = "username">
                    </div>
                    <div>
                        <label for = "password">Password: </label>
                        <input type = "text" id = "password" name = "password">
                    </div>
                    <div>
                        <label for = "confirm_password">Confirm Password: </label>
                        <input type="text" id = "confirm_password" name = "confirm_password">
                        <?php echo $confirm_error; ?>
                    </div>
                    <div>
                        <label for = "forename">Forename: </label>
                        <input type="text" if = "forename" name = "forename">
                    </div>
                    <div>
                        <label for = "surname">Surname: </label>
                        <input type="text" if = "surname" name = "surname">
                    </div>
                    <div>
                        <label for = "email">Email: </label>
                        <input type="text" id = "email" name = "email">
                    </div>
                    <div class = "submit">
                        <input type="submit" value = "Submit">
                    </div>
                </form>
            </div>
        </div>

        <div></div>
    </div>

</body>
</html>