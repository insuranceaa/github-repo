
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
			<li><div class=thispage>products</div>
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
		<table width=880>
		<tr><td width=400>
		<div class=midheader>Single Project Construction Insurance</div>
    <div class=midheader3>for registered builders and owner-builders</div>
		</td><td valign=bottom>
		<?php if(isset($_SESSION['username'])){ echo "
		<a href=spquote.php><div class=productpic></div><br>
		<div class=login2></div></a>";
		} else { echo "
		<a href=login.php><div class=productpic></div><br>
		<div class=login></div></a>";
		}
		?>
		</td></tr>
		<tr><td colspan=2><hr></td></tr>
		<tr><td width=400>
		<div class=midheader>Annual Construction Insurance</div>
    <div class=midheader3>for registered builders.</div>
		</td><td valign=bottom>
		<?php if(isset($_SESSION['username'])){ echo "
		<a href=apquote.php><div class=productpic></div><br>
		<div class=login2></div></a>";
		} else { echo "
		<a href=login.php><div class=productpic></div><br>
		<div class=login></div></a>";
		}
		?>
		</td></tr>
		<tr><td colspan=2><hr></td></tr>
		<tr><td width=700>
		<div class=midheader>Voluntary Workers Insurance</div>
    <div class=midheader3>group personal accident</div>
		<div class=midcontent><br>
      Available for owner-builder construction projects, canteens, Fetes, Child Supervision, Working Bees, Cleaning, Maintenance, Door Knock Appeals, and more.<br>
<br>
		</div>
		</td><td valign=bottom>
		<?php if(isset($_SESSION['username'])){ echo "
		<div class=productpic2></div><br>
		* coming soon.";
		} else { echo "
		<div class=productpic2></div><br>
		* coming soon.";
		}
		?>
		</td></tr>
		
		</table>
		
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