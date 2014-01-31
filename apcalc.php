<?php
session_start();

date_default_timezone_set('Australia/Perth');

if(!isset($_SESSION['username'])){
  echo "<script type='text/javascript'>
  window.location.assign('login.php');
  </script>";
} else { 

//if id set, get values from database
if(isset($_GET['id'])){
  
  $res = mysql_connect("localhost", "insur950_admin", "rgfellow7825");
  mysql_select_db("insur950_users", $res);
  $sql = "select * from quotes2 where id='".$_GET['id']."'";
  $result = mysql_query($sql,$res);
	$row = mysql_fetch_array($result);
	$_POST['id'] = $row[0];
  $_POST['insured'] = $row[1];
  $_POST['address1'] = $row[2];
  $_POST['suburb'] = $row[3];
  $_POST['state'] = $row[4];
  $_POST['postcode'] = $row[5];
    if($_POST['postcode']==0){ $_POST['postcode']=''; }
  $_POST['turnover'] = $row[6];
  $_POST['value'] = $row[7];

  $_POST['liability'] = $row[8];
  $_POST['strawbale'] = $row[9];

  $_POST['p26th'] = $row[10];
  $_POST['commission'] = $row[11];
  $_POST['brokerfee'] = $row[12];
    if($_POST['brokerfee']==0){ $_POST['brokerfee']=''; }
  $_POST['round'] = $row[13];
  $_POST['date'] = $row[14];
  $_POST['username'] = $row[15];
  $_POST['existing'] = $row[16];
    if($_POST['existing']==0){ $_POST['existing']=null; }
  $dbtotal = $row[17];
    if($dbtotal==0){ $dbtotal=null; }
  $_POST['plant'] = $row[18];
    if($_POST['plant']==0){ $_POST['plant']=null; }
  $_POST['excess'] = $row[19];
  
  mysql_close($res);
}
//end get values from database

if(isset($_POST)) {
//  $_SESSION['onoffswitch']='';
  foreach ($_POST as $key => $val) {
    if($val != "Submit")
     $_SESSION["$key"] = $val;
  }
}

//store quote
if(!isset($_GET['id'])){
  $res = mysql_connect("localhost", "insur950_admin", "rgfellow7825");
	if($res && (mysql_select_db("insur950_users", $res))) {
	
    if($_POST['id'] !=''){ //already stored. update instead.
    
      $sql = "update quotes2 set insured='".mysql_real_escape_string($_SESSION['insured'])."',address1='".mysql_real_escape_string($_SESSION['address1'])."',suburb='".mysql_real_escape_string($_SESSION['suburb'])."',state='".$_SESSION['state']."',postcode='".$_SESSION['postcode']."',turnover='".$_SESSION['turnover']."',value='".$_SESSION['value']."',liability='".$_SESSION['liability']."',strawbale='".$_SESSION['strawbale']."',p26th='".$_SESSION['p26th']."',commission='".$_SESSION['commission']."',brokerfee='".$_SESSION['brokerfee']."',round='".$_SESSION['round']."',date='".date("Y-m-d")."',username='".$_SESSION['username']."',existing='".$_SESSION['existing']."',plant='".$_SESSION['plant']."',excess='".$_SESSION['excess']."' where id='".$_SESSION['id']."'";
      mysql_query($sql, $res);
  
    } else { //store as new quote
    
      $sql = "insert into quotes2 (insured, address1, suburb, state, postcode, turnover, value, liability, strawbale, p26th, commission, brokerfee, round, date, username, existing, plant, excess) values ('".mysql_real_escape_string($_SESSION['insured'])."', '".mysql_real_escape_string($_SESSION['address1'])."', '".mysql_real_escape_string($_SESSION['suburb'])."', '".$_SESSION['state']."', '".$_SESSION['postcode']."', '".$_SESSION['turnover']."', '".$_SESSION['value']."', '".$_SESSION['liability']."', '".$_SESSION['strawbale']."', '".$_SESSION['p26th']."', '".$_SESSION['commission']."', '".$_SESSION['brokerfee']."', '".$_SESSION['round']."', '".date("Y-m-d")."', '".$_SESSION['username']."', '".$_SESSION['existing']."', '".$_SESSION['plant']."', '".$_SESSION['excess']."')";
      mysql_query($sql, $res);
      $_POST['id'] = mysql_insert_id();
      
    }
  }
}
//end store quote

//begin calculations

include 'rates.php';

$fslvar = strtolower($_POST['state'])."_fsl";
$fsl = $$fslvar;
$sdvar = strtolower($_POST['state'])."_sd";
$sd = $$sdvar;


//get rates from database
$res = mysql_connect("localhost", "insur950_admin", "rgfellow7825");
mysql_select_db("insur950_users", $res);
$sql = "select * from aprates where state='".$_POST['state']."'";
$result = mysql_query($sql,$res);
$row = mysql_fetch_array($result);
if($_POST['turnover'] <=350000) {
  $mrate = $row[1];
  if($_POST['liability'] == 5000000) {
    $prate = $row[8];
  } else if($POST['liability'] == 10000000) {
    $prate = $row[15];
  } else {
    $prate = $row[22];
  }
} else if($_POST['turnover'] <=500000) {
  $mrate = $row[2];
  if($_POST['liability'] == 5000000) {
    $prate = $row[9];
  } else if($POST['liability'] == 10000000) {
    $prate = $row[16];
  } else {
    $prate = $row[23];
  }
} else if($_POST['turnover'] <=1000000) {
  $mrate = $row[3];
  if($_POST['liability'] == 5000000) {
    $prate = $row[10];
  } else if($POST['liability'] == 10000000) {
    $prate = $row[17];
  } else {
    $prate = $row[24];
  }
} else if($_POST['turnover'] <=5000000) {
  $mrate = $row[4];
  if($_POST['liability'] == 5000000) {
    $prate = $row[11];
  } else if($POST['liability'] == 10000000) {
    $prate = $row[18];
  } else {
    $prate = $row[25];
  }
} else if($_POST['turnover'] <=1000000) {
  $mrate = $row[5];
  if($_POST['liability'] == 5000000) {
    $prate = $row[12];
  } else if($POST['liability'] == 10000000) {
    $prate = $row[19];
  } else {
    $prate = $row[26];
  }
} else if($_POST['turnover'] <=1500000) {
  $mrate = $row[6];
  if($_POST['liability'] == 5000000) {
    $prate = $row[13];
  } else if($POST['liability'] == 10000000) {
    $prate = $row[20];
  } else {
    $prate = $row[27];
  }
} else if($_POST['turnover'] <=2000000) {
  $mrate = $row[7];
  if($_POST['liability'] == 5000000) {
    $prate = $row[14];
  } else if($POST['liability'] == 10000000) {
    $prate = $row[21];
  } else {
    $prate = $row[28];
  }
} else {
  $error = "manual rating required for turnover over $20m";
}
$plantrate = $row[29];
$mmin = $row[30];
$p5min = $row[31];
$p10min = $row[32];
$p20min = $row[33];
if($_POST['liability'] == 5000000){
  $pmin = $p5min;
} else if($_POST['liability'] == 10000000){
  $pmin = $p10min;
} else {
  $pmin = $p20min;
}

$sql = "select * from apexcess";
$result = mysql_query($sql,$res);
$row = mysql_fetch_array($result);
if($_POST['excess']==500){
  $erate = $row[0];
} else if($_POST['excess']==1000){
  $erate = $row[1];
} else if($_POST['excess']==2500){
  $erate = $row[2];
} else if($_POST['excess']==5000){
  $erate = $row[3];
} else if($_POST['excess']==10000){
  $erate = $row[4];
} else {
  $erate = $row[5];
}
//end get rates from db

$mrate = (0.85 * $mrate) / (1- ($_POST['commission']/100));
$prate = (0.85 * $prate) / (1- ($_POST['commission']/100));
$plantrate = (0.85 * $plantrate) / (1- ($_POST['commission']/100));

$mprem = round(($mrate * $_POST['turnover'] * $erate), 2);
if($mprem < $mmin) {
  $mprem = $mmin;
}
$pprem = round(($prate * $_POST['turnover'] * $erate), 2);
if($pprem < $pmin) {
  $pprem = $pmin;
}
$plantprem = round(($plantrate * $_POST['plant'] * $erate), 2);

$totalprem = $mprem + $pprem + $plantprem;
$adminfee = 110;
$brokerfee = $_POST['brokerfee'];

$totalbase = $totalprem;
$totalfsl = round(($fsl * ($mprem + $plantprem)), 2);
$totalsd = round(($sd * 1.1 * ($totalbase + $totalfsl)), 2);

$totalquoted = (1.1*$totalbase) + $adminfee + $brokerfee + (1.1*$totalfsl) + $totalsd;

//rounding up to nearest dollar
if($_POST['round']=='yes') {
  $diff = ceil($totalquoted) - $totalquoted;
  $brokerfee = $brokerfee + $diff;
  $totalquoted = $totalquoted + $diff;
}

$commission = $totalbase * ($_POST['commission']/100);

//end calculations

if(!isset($_GET['id'])){
  $newcalc = true;
}

//store total amount quoted if newly calculated
if($newcalc == true) {
  $sql = "update quotes2 set totalpremium = '".$totalquoted."' where id = '".$_POST['id']."'";
  mysql_query($sql,$res);
}
//

if(isset($_GET['id']) && ($totalquoted != $dbtotal)){ //if recalling quote and it's changed already
  $todaysec = strtotime(date('Y-m-d'));
  $quotedsec = strtotime($_POST['date']);
  $diffsec = $todaysec - $quotedsec;
  $diffmin = $diffsec / 60;
  $diffhr = $diffmin / 60;
  $diffdays = $diffhr / 24;
  $diff = $totalquoted - $dbtotal;
  $totalquoted = $dbtotal; //stick with the old quote
  $adminfee = $adminfee - $diff;
  
  if($diffdays > 30) { //if quote less than 30 days old
    $oldquote = "* quote is over 30 days old. click 'edit quote' to update.";
  }
}


	$_SESSION['usertag'] = $_SESSION['username']." <a class=submit2 href='logout.php'>logout</a>";
  echo "
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
<html>
<head>
<title>Insurance Agency Australia</title>
<meta name=viewport content='user-scalable=no'>";
 
$mobile_agents = '!(tablet|pad|mobile|phone|symbian|android|ipod|ios|blackberry|webos)!i';
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
		<div class=midcontent>";
//   echo "mbase=".number_format($mbase, 2).", 
//mprem=$".number_format($mprem, 2).", 
//exbase=$".number_format($exbase, 2).", 
//exprem=$".number_format($exprem, 2).", 
//plantbase=$".number_format($plantbase, 2).", 
//plantprem=$".number_format($plantprem, 2).", 
//plbase=$".number_format($plbase, 2).", 
//plprem=$".number_format($plprem, 2).", 
//loading=".number_format($loading, 2).", 
//totalbase=$".number_format($totalbase, 2).", 
//totalprem=$".number_format($totalprem, 2).", 
//commission=$".number_format($commission, 2).", 
//brokerfee=$".number_format($_POST['brokerfee'], 2).", 
//Price=$".number_format($totalprem + $_POST['brokerfee'], 2);
  
$_SESSION['site'] = $_POST['address1']." ".$_POST['suburb']." ".$_POST['state']." ".$_POST['postcode'];
 
echo "
<div class=midleft2>
Summary of Details:<br>
<br>
<table class=midleft2>
  <tr>
    <td>Insured:</td><td>".$_POST['insured']."</td>
  </tr>
  <tr>
    <td>Address:</td><td>".$_SESSION['site']."</td>
  </tr>
    <tr>
    <td>Turnover:</td><td>$".number_format($_POST['turnover'], 0)."</td>
  </tr>
  <tr>
    <td>Max Project Value:</td><td>$".number_format($_POST['value'], 0)."</td>
  </tr>";

  echo "
  <tr>
    <td>Tools, Plant & Equipment:</td><td>";
    if($_POST['plant']!=''){
      echo "$".number_format($_POST['plant'], 0);
    } else {
      echo "Not Insured";
    }
    echo "</td>
  </tr>
  <tr>
    <td>Public Liability:</td><td>$".number_format($_POST['liability'], 0)."</td>
  </tr>
  <tr>
    <td>Building Materials:</td><td>";
    if($_POST['strawbale']=='yes'){
      echo "includes Strawbale";
    } else {
      echo "other than strawbale";
    }
    echo "</td>
  </tr>
  <tr>
    <td>Sites above 26th parallel?:</td><td>".$_POST['p26th']."</td>
  </tr>
</table>
</div>
<div class=midmid2>
  ANNUAL CONSTRUCTION INSURANCE<BR>
  <br>
  <div id=resultquote>
      <div class=tdcol>&nbsp;</div><div class=tdcol>Amount</div><div id=tdcol>GST</div><br clear=all>

      <div class=tdcol>Base:</div><div class='tdcol moneybox1'>$".number_format($totalbase, 2)."</div><div class='tdcol moneybox1'>$".number_format($totalbase * 0.1, 2)."</div><br clear=all>

      <div class=tdcol>FSL:</div><div class='tdcol moneybox1'>$".number_format($totalfsl, 2)."</div><div class='tdcol moneybox1'>$".number_format($totalfsl * 0.1, 2)."</div><br clear=all>

      <div class=tdcol>SD:</div><div class='tdcol moneybox1'>$".number_format($totalsd, 2)."</div><div class='tdcol moneybox1'>$0.00</div><br clear=all>

      <div class=tdcol>Admin Fee:</div><div class='tdcol moneybox1'>$".number_format(($adminfee/1.1), 2)."</div><div class='tdcol moneybox1'>$".number_format($adminfee-($adminfee/1.1), 2)."</div><br clear=all>

      <div class=tdcol>Broker Fee:</div><div class='tdcol moneybox1'>$".number_format(($brokerfee/1.1), 2)."</div><div class='tdcol moneybox1'>$".number_format($brokerfee-($brokerfee/1.1), 2)."</div><br clear=all>

      <div class=tdcol>Commission:&nbsp;&nbsp;&nbsp;</div><div class='tdcol moneybox1'>$".number_format($commission, 2)."</div><div class='tdcol moneybox1'>$".number_format($commission * 0.1, 2)."</div><br clear=all>
      
      <div class=tdcol>&nbsp;</div><br clear=all>
      <div class=tdcol>TOTAL PREMIUM:</div><div class='tdcol moneybox2'>$".number_format($totalquoted, 2)." (inc gst)</div><br clear=all>

  </div>
<br>
<a href='docs/ap.pdf' target=_blank><div class=pdftext><div class=docimage></div></div><div class=pdftext>Policy Wording</div></a>
&nbsp;
<a href='docs/PDF/PROPOSAL.php' target=_blank><div class=pdftext><div class=docimage></div></div><div class=pdftext>Proposal Form</div></a>
<br clear=all>
<br>
<form method=post action='apquote.php'>
<input type=hidden name=id value='".$_POST['id']."'>";
if(!isset($oldquote)){
echo "
<input type=button class='submit getcover' value='get covernote &rarr;'>
";
} else {
  echo "<i>".$oldquote."</i>";
}
echo "
<input type=submit class='submit editquote' value='&larr; edit quote'>

</form>
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



mysql_close($res);



}
?>