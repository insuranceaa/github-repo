
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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src='js/javascript.js'></script>
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
			<li><a href='index.php'>home</a>
			<li><div class=thispage>about</div>
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
		<div class=aus></div>
		<div class=logo></div>
		<br clear=all>
		<br>
		<hr>
		<div class=midheader3>WHAT MAKES INSURANCE AGENCY AUSTRALIA SPECIAL?</div>
		<hr>
		<div class=midcontent>
		<div class=midpartleft><b>EXPERTISE AND GREAT SERVICE</b><br>
		<br>
Insurance Agency Australia (IAA) has developed market leading customised solutions that are supported by experienced specialist underwriting staff and the strength of major insurance companies.<br>
<br>
We are committed to providing our customers with prompt and efficient service.
</div>
		<div class=midpartright><b>QUICK AND EASY ACCESS</b><br>
		<br>
Our systems allow you access to uniquely tailored software which quotes, provides full documentation and allows cover to be placed, all in just minutes.<br>
<br>
No more waiting for an underwriter to get back to you. When you do need to speak to us however we're waiting for your call.
</div><br clear=all>
<br><br>
IAA is an Authorised Representative (447235) of Underwriting Australia Pty Ltd (AFSL 322536) which has its operations based in North Sydney, providing strategic, operational and compliance management functions.<br>
IAA is managed out of Perth by Mark Adams.  Along with the rest of our professional team, Mark acts as the brokers’ primary contact for all insurance products provided by IAA.<br>
IAA provides clients with market leading products, while providing brokers with a distinct edge in the provision of our products.  We achieve this through experienced and intelligent underwriting combined with technologically innovative service delivery methods to brokers. The simplest requests will be handled quickly and efficiently with minimal contact, while more complex requests are given the detailed attention required and the best advice. We want brokers to say that we are both easy and satisfying to deal with, while the client receives a great product at a great price.
		</div><br clear=all>

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