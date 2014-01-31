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

<div class=top><div class=user>
".$_SESSION['usertag']."
</div></div>
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
			<li><div class=thispage>quotes</div>
		</ul>
		</nav>
		</div>
		<br clear=all>
		<div class=aus></div>
		<div class=logo></div>
		<br clear=all>
		<br>
		<hr>
		<div class=midcontent>
      <a href=quotes.php><div id=findquote><img src='images/search.png' valign=middle></div><div id=fqx>FIND AN EXISTING QUOTE</div></a>
      <br clear=all><br>
      <div class=midpartleft>
        <img src='images/construct.png' width=125>
        <div style='float:right;valign:top;align:right;'>Single Project Construction Insurance<br>
        <br>
        <a href=spquote.php><img src='images/login2.png'></a> 
      </div></div>
      <div class=midpartright>
        <a href='docs/sp.pdf' target=_blank><img src='images/pdf.png'>Single Project Construction Insurance Policy Wording</a>
      </div>
      <br clear=all><hr>
      <div class=midpartleft>
        <img src='images/construct.png' width=125>
        <div style='float:right;valign:top;align:right;'>Annual Construction Insurance<br>
        <br>
        <a href=apquote.php><img src='images/login2.png'></a> 
      </div></div>
      <div class=midpartright>
        
      </div>
      <br clear=all><hr>
      <div class=midpartleft>
        <img src='images/injury.png' width=125>
        <div style='float:right;valign:top;align:right;'>Voluntary Workers Insurance<br>
        <br>
        * coming soon.
      </div></div>
      <div class=midpartright>
        
      </div>

    </div><br clear=all>
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
</html>
";
}
?>