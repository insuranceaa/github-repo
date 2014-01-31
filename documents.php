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
			<li><a href='about.php'>about</a>
			<li><a href='contact.php'>contact</a>
			<li><a href='products.php'>products</a>
			<li><div class=thispage>documents</div>
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
    <div class=midheader3>Policy Documents</div>
		<div class=midcontent>   
      <br>
      <a href='docs/sp.pdf' target=_blank><div class=pdf></div><div class=pdftext>Single Project Construction Insurance Policy Wording</div></a>
<br clear=all><br>
<a href='docs/vw.pdf' target=_blank><div class=pdf></div><div class=pdftext>Voluntary Workers Insurance Policy Wording</div></a>
<br clear=all><br>
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