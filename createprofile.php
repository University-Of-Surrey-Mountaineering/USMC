<?php

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
                        <input type="submit">
                    </div>
                </form>
            </div>
        </div>

        <div></div>
    </div>

</body>
</html>