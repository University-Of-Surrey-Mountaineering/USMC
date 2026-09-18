<?php 
$command = trim("python ./getallcommittee.py");
$output = shell_exec($command);
$out = explode("\n", $output);

function testdata($string) {
  if ($string[0] == "("){
    return substr($string, 2, -1);
  }
  elseif (substr($string, -1) == ")"){
    return substr($string, 2, -2);
  }
  else {
    return substr($string, 2, -1);
  }
}

function fixcommittee($string) {
  $arr = explode(",", $string);
  $commitarr = [];
  foreach ($arr as $c => $i){
    $commitarr[] = testdata($i); 
  }
  return $commitarr;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <title>University Of Surrey Mountaineering</title>
</head>
<body>
  <header class = "Banner">
    <div><img src="Photos/edited-photo.png"></div>
    <div></div>
    <div class="login"><button onclick="location.href = 'login.php'">login</button></div>
  </header>   

  <div class = "Header">
    <div></div>
    <div class="Header_Container">
      <div class="Logo"><img src="Photos/edited-photo.png"></div>
    </div>
    <div></div>
  </div>

  <div class="description">
    <div>
      <h3>We are a friendly and welcoming club with a shared passion for climbing and mountaineering. Whether you're a complete beginner or an experienced climber, we offer something for everyone! Our weekly climbing sessions take place at Surrey Summit, where you can develop your skills, meet like-minded people, and have fun. We also organize regular trips, including outdoor climbing, mountain climbing and hiking, and unparalleled vibes. community is at the heart of what we do, ensuring a supportive and friendly environment for all. Join us for exciting challenges, breath-taking views, and an amazing community full of energy and good vibes!</h3>
      <h4>
Weekly activities:<br>
Monday climbing session - 7pm to 9pm<br>
Wednesday climbing session - 3pm to 5pm<br>
Friday climbing session - 7pm to 9pm</h4>
<h4>

What we also do: <br>
- Regular socials! (both drinking and non-drinking) <br>
- Amazing trips... such as our annual trips to Ailefroide in the French Alps.<br>
- Top rope and lead climbing training all included in your membership <br>
</h4>
    </div>
  </div>

  <div class = "commitcont">
    <?php foreach ($out as $index => $counter): ?>
      <?php $member = fixcommittee($counter);
      $fullname = $member[0] . " " . $member[1]; 
      $pfp = $member[2];
      $rolename = $member[3];
      $about = $member[4];
      ?>
      <div></div>
      <div class="committee">
          <div class = "pfp">
            <div id="pfp<?php echo $index; ?>"></div>
          </div>
          <div class = "desc">
            <div class="about">
              <div>
                <p>Role:</p>
                <p><?php echo $rolename;?></p>
              </div>
              <div>
                <p>My name is: </p>
                <p><?php echo $fullname;?></p>
              </div>  
            </div>
            <br>
            <div class = "about">
              <div>
                <p>About me:</p>
                <p class = "text"> <?php echo $about;?> </p>
              </div>  
            </div>
          </div>
          <br>

          <style>
            #pfp<?php echo $index; ?> {
              justify-items: center;
              justify-content: center;
              height:20vh;
              width:10vw;
              background-image: url(<?php echo $pfp;?>);
              border-radius: 50%;
              background-position: center;
              background-size: auto 20vh;
              background-repeat: no-repeat;
              margin: 1%;
              }
          </style>
      </div>
      <div></div>

    <?php endforeach; ?>
  </div>


</body>
</html>