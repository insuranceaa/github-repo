<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title></title>

<?php 
$mobile_agents = '!(phone|symbian|android|ipod|blackberry|webos)!i';
if(preg_match($mobile_agents, $_SERVER['HTTP_USER_AGENT'])) {
	echo "<link rel='stylesheet' href='css/mobile.css' type='text/css'>";
} else {
	echo "<link rel='stylesheet' href='css/style.css' type='text/css'>
	<link rel='stylesheet' media='only screen and (max-device-width: 480px)' href='css/mobile.css' type='text/css'>";
}
?>

</head>
<body><br><br>
<div id=ff>
<ul>

			<li><div class=webpic></div><div class=webpictext><b>Visit</b><br><a href=www.insuranceaa.com.au target=_top>www.insuranceaa.com.au</a></div></li>

			<li><div class=phonepic></div><div class=phonepictext><b>Call</b><br>
			T: +618 9248 3679<br>
			F: +618 9223 8828</div></li>

			<li><div class=emailpic></div><div class=emailpictext><b>Contact</b><br>
			<a href=mailto:queries@insuranceaa.com.au>queries@insuranceaa.com.au</a></div></li>

			<li><div class=copypic></div><div class=copypictext>	© 2013 Insurance Agency<br>Australia. All rights reserved.</div></li>
</ul>
</div>
</body>
</html>