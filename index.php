<?php
session_start();

date_default_timezone_set('Australia/Perth');
if(isset($_SESSION['username'])){
	$_SESSION['usertag'] = $_SESSION['username']." <a class=submit2 href='logout.php'>logout</a>";
}
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

<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js'></script>
<script type='text/javascript' src='js/javascript.js'></script>
</head>
<body>

<div class=top><div class=user>
	<?php echo $_SESSION['usertag']; ?>
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
			<li><div class=thispage>home</div>
			<li><a href='about.php'>about</a>
			<li><a href='contact.php'>contact</a>
			<li><a href='products.php'>products</a>
			<li><a href='documents.php'>documents</a>
<?php if(isset($_SESSION['username'])){
	echo "<li><a href='members.php'>quotes</a>";
} else {
	echo "<li><a href='login.php'>login</a>";
}
?>
		</ul>
		</nav>
		</div>
		<br clear=all>
		<div class=banner></div>
		<div class=logo></div>
		<br clear=all>
		<div class=aus></div><br clear=all>
		<div class=midheader>Market Leading Insurance Solutions</div>
		<div class=midcontent>
		Insurance Agency Australia (IAA) has developed market leading customised solutions that are supported by experienced specialist underwriting staff  and the strength of major insurance companies.
 
We are committed to providing our customers with prompt and efficient service.
		</div><br clear=all>
		<a href='about.php'><div class=more></div></a>
		
	</div><br clear=all>
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