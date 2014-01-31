<?php
session_start();

date_default_timezone_set('Australia/Perth');

?>


<!DOCTYPE html>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN' 'http://www.w3.org/TR/html4/strict.dtd'>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html>
<head>
<title>Insurance Agency Australia</title>

<?php 
$mobile_agents = '!(phone|symbian|android|ipod|blackberry|webos)!i';
if(preg_match($mobile_agents, $_SERVER['HTTP_USER_AGENT'])) {
	echo "<link rel='stylesheet' href='css/mobile.css' type='text/css'>";
} else {
	echo "<link rel='stylesheet' href='css/style.css' type='text/css'>
	<link rel='stylesheet' media='only screen and (max-device-width: 480px)' href='css/mobile.css' type='text/css'>";
}
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src='js/javascript.js'></script>
</head>
<body>

<div class=top>
	
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
			<li><div class=thispage>login</div>
		</ul>
		</nav>
		</div>
		<br clear=all>
		<div class=aus></div>
		<div class=logo></div>
		<br clear=all>
		<br>
		<hr>
		<div class=midcontent2>
      <div class=midheader2>BROKERS PLEASE LOGIN BELOW</div><br>
      <i>(if you are not a broker please instead use our <a href=contact.php>'contact page'</a> and we can send your query direct to one of our brokers in your area)</i><br>
<br>
      <form id=contactform name=loginform action=loginformconfirmation.php method=post>
        <input type=text name=username placeholder='Username/Email'><br>
        <input type=password name=password placeholder='Password'><br>
        <input class=submit type=submit value=submit>
        <br clear=all>
      </form><br>
      <br>
      <a href=apply.php>Don't have an IAA login? Click here to apply for one or give us a call at the number below.</a>
		</div>
	</div>
</div>
<div class=outerfoot>
	<div class=footer>
		<object type="text/html" data="footer.php"></object>
	</div>
</div>	
<div class=subfooter>
	
</div>



</body>
</html>