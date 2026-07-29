<html>
<body>

<?php

session_start();

$uname = $_GET["UserName"];
$pword = $_GET["Password"];
$command = "python ./login.py " . $uname . " ".  $pword;

$output = shell_exec($command);
echo $output;

?>

</body>
</html>