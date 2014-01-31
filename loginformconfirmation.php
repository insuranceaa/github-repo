<?php
session_start();
if(isset($_POST)) {
 foreach ($_POST as $key => $val) {
  if($val != "submit")
   $_SESSION["$key"] = $val;
 }
}
date_default_timezone_set('Australia/Perth');

if(isset($_POST['username'])) {
  $res = mysql_connect("localhost", "insur950_admin", "rgfellow7825");
	mysql_select_db("insur950_users", $res);
}

$sql = "SELECT password from users where username = '".$_POST['username']."'";
$result = mysql_query($sql,$res);
while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
  $db_password = $row[0];
}


if(crypt($_POST['password'],$db_password) == $db_password) {

  echo "<script type='text/javascript'>
  window.location.assign('members.php');
  </script>";
} else {
  echo "<script type='text/javascript'>
  alert('Login Failed.  Contact IAA to get our assistance.');
  window.location.assign('logout.php');
  </script>";
}

mysql_close($res);
?>