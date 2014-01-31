<?php
session_start();
foreach($_SESSION as $key => $val) {
	$_SESSION["$key"] = null;
}

  echo "<script type='text/javascript'>
  window.location.assign('login.php');
  </script>";

?>