<?php
session_start();

date_default_timezone_set('Australia/Perth');

if(!isset($_SESSION['username'])){
  echo "<script type='text/javascript'>
  window.location.assign('login.php');
  </script>";
} else { 
$_SESSION['usertag'] = $_SESSION['username']." <a class=submit2 href='logout.php'>logout</a>";
echo "
<!DOCTYPE html>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN' 'http://www.w3.org/TR/html4/strict.dtd'>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html>
<head>
<title>Insurance Agency Australia</title>";


$mobile_agents = '!(phone|symbian|android|ipod|blackberry|webos)!i';
if(preg_match($mobile_agents, $_SERVER['HTTP_USER_AGENT'])) {
	echo "<link rel='stylesheet' href='css/mobile.css' type='text/css'>";
} else {
	echo "<link rel='stylesheet' href='css/style.css' type='text/css'>
	<link rel='stylesheet' media='only screen and (max-device-width: 480px)' href='css/mobile.css' type='text/css'>";
}

echo "
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js'></script>
<script type='text/javascript' src='js/javascript.js'></script>
</head>
<body>

<div class=top>
<div class=user>
".$_SESSION['usertag']."
</div>	
</div>
<div class=outermid>
	<div class=middle>
    <div class=midish>
      <div class=header>Insurance Agency Australia</div>
      <div class=header2>COVERING THE NATION</div>
    </div>
		<div class=menu>
		<nav id='nav-wrap'>
		<ul id=nav>
			<li><a href='index.php'>home</a>
			<li><a href='about.php'>about</a>
			<li><a href='contact.php'>contact</a>
			<li><a href='products.php'>products</a>
			<li><a href='documents.php'>documents</a>
			<li><a href='members.php'>quotes</a>
		</ul>
		</nav>
		</div>
		<br clear=all>
		<div class=aus></div>
		<div class=logo></div>
		<br clear=all>
		<br>
		<hr>
		<div class=outmid3>
		
		&nbsp;&nbsp;&nbsp;&nbsp;SEARCH : <input class=search id=searchstr type=text placeholder='enter client name here' onkeydown='search(event);' size=50><br>
		<br>
		<div class=midcontent3>
		Single Project Construction Quotes :<br>";
      
    $res = mysql_connect("localhost", "insur950_admin", "rgfellow7825");
    mysql_select_db("insur950_users", $res);
    $sql = "select * from quotes where username = '".$_SESSION['username']."' order by date desc";
    $result = mysql_query($sql,$res);
    echo "<div class=qhead>client</div><div class=qhead>quote date</div><div class=qhead>link</div><br clear=all>";
    $count=0;
    while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
      $count++;
      if($count < 12){
        echo "<div class=rows><div class=qbod>".$row[1]."</div><div class=qbod>".$row[17]."</div><div class=qbod><a class=submit2 href='spcalc.php?id=".$row[0]."'>view</a></div></div>";
      } else {
        echo "<div class=rows style='display:none'><div class=qbod>".$row[1]."</div><div class=qbod>".$row[17]."</div><div class=qbod><a class=submit2 href='spcalc.php?id=".$row[0]."'>view</a></div></div>";
      }
    }
    if($count > 11){
      echo "<div id=morex>...</div>";
    } else {
      echo "<div id=morex style='display:none'>...</div>";
    }
    
    echo "

		</div>
		<div class=midcontent3>
      Annual Construction Quotes :<br>";
      
    $res = mysql_connect("localhost", "insur950_admin", "rgfellow7825");
    mysql_select_db("insur950_users", $res);
    $sql = "select * from quotes2 where username = '".$_SESSION['username']."' order by date desc";
    $result = mysql_query($sql,$res);
    echo "<div class=qhead>client</div><div class=qhead>quote date</div><div class=qhead>link</div><br clear=all>";
    $count=0;
    while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
      $count++;
      if($count < 12){
        echo "<div class=rows2><div class=qbod>".$row[1]."</div><div class=qbod>".$row[14]."</div><div class=qbod><a class=submit2 href='apcalc.php?id=".$row[0]."'>view</a></div></div>";
      } else {
        echo "<div class=rows2 style='display:none'><div class=qbod>".$row[1]."</div><div class=qbod>".$row[14]."</div><div class=qbod><a class=submit2 href='apcalc.php?id=".$row[0]."'>view</a></div></div>";
      }
    }
    if($count > 11){
      echo "<div id=morex2>...</div>";
    } else {
      echo "<div id=morex2 style='display:none'>...</div>";
    }
    
    echo "
    </div>
    </div>
	</div>
</div>
<div class=outerfoot>
	<div class=footer>
		<object type='text/html' data='footer.php'></object>
	</div>
</div>	
<div class=subfooter>
	
</div>



</body>
</html>";
}
?>