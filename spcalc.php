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
  $sql = "select * from quotes where id='".$_GET['id']."'";
  $result = mysql_query($sql,$res);
	$row = mysql_fetch_array($result);
	$_POST['id'] = $row[0];
  $_POST['insured'] = $row[1];
  $_POST['address1'] = $row[2];
  $_POST['suburb'] = $row[3];
  $_POST['state'] = $row[4];
  $_POST['postcode'] = $row[5];
    if($_POST['postcode']==0){ $_POST['postcode']=''; }
  $_POST['project'] = $row[6];
  $_POST['value'] = $row[7];
  $_POST['commenced'] = $row[8];
  $_POST['workdone'] = $row[9];
  $_POST['liability'] = $row[10];
  $_POST['strawbale'] = $row[11];
  $_POST['island'] = $row[12];
  $_POST['p26th'] = $row[13];
  $_POST['commission'] = $row[14];
  $_POST['brokerfee'] = $row[15];
    if($_POST['brokerfee']==0){ $_POST['brokerfee']=''; }
  $_POST['round'] = $row[16];
  $_POST['date'] = $row[17];
  $_POST['username'] = $row[18];
  $_POST['existing'] = $row[19];
    if($_POST['existing']==0){ $_POST['existing']=null; }
  $dbtotal = $row[20];
    if($dbtotal==0){ $dbtotal=null; }
  $_POST['plant'] = $row[21];
    if($_POST['plant']==0){ $_POST['plant']=null; }
  
  if($_POST['project'] == 'Description of Works'){
    $_SESSION['onoffswitch'] = 'quick';
  }
  if(($_POST['project'] !='Single_Dwelling') && ($_POST['project'] !='Single_Dwelling_and_Pool') && ($_POST['project'] !='Kit_Home') && ($_POST['project'] !='Unit_Duplex_Villa') && ($_POST['project'] !='Swimming_Pool') && ($_POST['project'] !='Transportable_Dwelling') && ($_POST['project'] !='Description of Works')){
    $_POST['isexisting']='yes';
  }
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
    
      $sql = "update quotes set insured='".mysql_real_escape_string($_SESSION['insured'])."',address1='".mysql_real_escape_string($_SESSION['address1'])."',suburb='".mysql_real_escape_string($_SESSION['suburb'])."',state='".$_SESSION['state']."',postcode='".$_SESSION['postcode']."',project='".$_SESSION['project']."',value='".$_SESSION['value']."',commenced='".$_SESSION['commenced']."',liability='".$_SESSION['liability']."',strawbale='".$_SESSION['strawbale']."',island='".$_SESSION['island']."',p26th='".$_SESSION['p26th']."',commission='".$_SESSION['commission']."',brokerfee='".$_SESSION['brokerfee']."',round='".$_SESSION['round']."',date='".date("Y-m-d")."',username='".$_SESSION['username']."',existing='".$_SESSION['existing']."',plant='".$_SESSION['plant']."' where id='".$_SESSION['id']."'";
      mysql_query($sql, $res);
  
    } else { //store as new quote
    
      $sql = "insert into quotes (insured, address1, suburb, state, postcode, project, value, commenced, liability, strawbale, island, p26th, commission, brokerfee, round, date, username, existing, plant) values ('".mysql_real_escape_string($_SESSION['insured'])."', '".mysql_real_escape_string($_SESSION['address1'])."', '".mysql_real_escape_string($_SESSION['suburb'])."', '".$_SESSION['state']."', '".$_SESSION['postcode']."', '".$_SESSION['project']."', '".$_SESSION['value']."', '".$_SESSION['commenced']."', '".$_SESSION['liability']."', '".$_SESSION['strawbale']."', '".$_SESSION['island']."', '".$_SESSION['p26th']."', '".$_SESSION['commission']."', '".$_SESSION['brokerfee']."', '".$_SESSION['round']."', '".date("Y-m-d")."', '".$_SESSION['username']."', '".$_SESSION['existing']."', '".$_SESSION['plant']."')";
      mysql_query($sql, $res);
      $_POST['id'] = mysql_insert_id();
      
    }
  }
}
//end store quote

//begin calculations
$adminfee = 77;

$contractworksrate = 0.0008 / (1- ($_POST['commission']/100));
$existingstructurerate = 0.001 / (1- ($_POST['commission']/100));
$contractplantrate = 0.0128 / (1- ($_POST['commission']/100));

$pl5mrate = 0.000888 / (1- ($_POST['commission']/100));
$pl10mrate = 0.001 / (1- ($_POST['commission']/100));
$pl20mrate = 0.0011 / (1- ($_POST['commission']/100));

$commencedloading = 1.1;
$strawbaleloading = 1.1;
$above26loading = 1.1;
$islandloading = 1.2;
$poolloading = 1.5;

$loading = 1;
if($_POST['commenced']=='yes'){
  $loading = $loading * $commencedloading;
}
if($_POST['strawbale']=='yes'){
  $loading = $loading * $strawbaleloading;
}
if($_POST['p26th']=='yes'){
  $loading = $loading * $above26loading;
}
if($_POST['island']=='yes'){
  $loading = $loading * $islandloading;
}
if($_POST['project']=='Swimming_Pool'){
  $loading = $loading * $poolloading;
}


include 'rates.php';

$fslvar = strtolower($_POST['state'])."_fsl";
$fsl = $$fslvar;
$sdvar = strtolower($_POST['state'])."_sd";
$sd = $$sdvar;

if($_POST['plant']==''){
  $plantbase=0;
  $plantprem=0;
} else {
  $plantbase = $_POST['plant'] * $contractplantrate;
  $plantbase2 = $plantbase * $loading;
  $plantfsl = $plantbase2 * $fsl;
  $plantgst = ($plantbase2 + $plantfsl) * 0.1;
  $plantsd = ($plantbase2 + $plantfsl + $plantgst) * $sd;
  $plantprem = round(($plantbase2 + $plantfsl + $plantgst + $plantsd), 2);
}

if($_POST['existing']==''){
  $exbase=0;
  $exprem=0;
} else {
  $exbase = $_POST['existing'] * $existingstructurerate;
  $exbase2 = $exbase * $loading;
  $exfsl = $exbase2 * $fsl;
  $exgst = ($exbase2 + $exfsl) * 0.1;
  $exsd = ($exbase2 + $exfsl + $exgst) * $sd;
  $exprem = round(($exbase2 + $exfsl + $exgst + $exsd), 2);
}

$sectionminimum = 200 / (1- ($_POST['commission']/100));

$mbase = $_POST['value'] * $contractworksrate;
if(($mbase + $exbase + $plantbase)< $sectionminimum) {
  $mbase = $sectionminimum - ($exbase + $plantbase);
}
$mbase2 = $mbase * $loading;
$mfsl = $mbase2 * $fsl;
$mgst = ($mbase2 + $mfsl) * 0.1;
$msd = ($mbase2 + $mfsl + $mgst) * $sd;
$mprem = round(($mbase2 + $mfsl + $mgst + $msd), 2);



if($_POST['liability']=='none'){
  $plbase=0;
  $plprem=0;
} else {
  $plvar = "pl".substr($_POST['liability'],0,strlen($_POST['liability'])-6)."mrate";
  $plbase = $_POST['value'] * $$plvar;
  if($plbase < $sectionminimum) {
    $plbase = $sectionminimum;
  }
  $plbase2 = $plbase * $loading;
  $plgst = $plbase2 * 0.1;
  $plsd = ($plbase2 + $plgst) * $sd;
  $plprem = round(($plbase2 + $plgst + $plsd), 2);
}

$totalbase = $mbase2 + $exbase2 + $plantbase2 + $plbase2;
$totalprem = $mprem + $exprem + $plantprem + $plprem;

$commission = $totalbase * ($_POST['commission']/100);
$totalfsl = round(($plantfsl + $exfsl + $mfsl), 2);
$totalsd = round(($plantsd + $exsd + $msd + $plsd), 2);
$totalgst = $plantgst + $exgst + $mgst + $plgst;

$brokerfee = $_POST['brokerfee'];
//rounding
if($_POST['round']=='yes') {
  $diff = ceil($totalprem + $adminfee + $brokerfee) - ($totalprem + $adminfee +   $brokerfee);
  $brokerfee = $brokerfee + $diff;
}
$totalquoted = $totalprem + $adminfee + $brokerfee;
//end calculations

if(!isset($_GET['id'])){
  $newcalc = true;
}

//store total amount quoted if newly calculated
if($newcalc == true) {
  $sql = "update quotes set totalpremium = '".$totalquoted."' where id = '".$_POST['id']."'";
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
 
if(($_POST['onoffswitch']=='quick') || ($_POST['project'] == 'Description of Works')) {
  $projecttype = 'Not Supplied (quick quote)';
} else {
  $projecttype = $_POST['project'];
}
 
echo "
<div class=midleft2>
Summary of Details:<br>
<br>
<table class=midleft2>
  <tr>
    <td>Name of Insured:</td><td>".$_POST['insured']."</td>
  </tr>
  <tr>
    <td>Project Site Address:</td><td>".$_SESSION['site']."</td>
  </tr>
  <tr>
    <td>Type of Project:</td><td>".$projecttype."</td>
  </tr>
  <tr>
    <td>Project Value:</td><td>$".number_format($_POST['value'], 0)."</td>
  </tr>
  <tr>
    <td>Has any work commenced?:</td><td>".$_POST['commenced']."</td>
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
    <td>Existing Structures:</td><td>";
    if($_POST['existing']!=null){
      echo "$".number_format($_POST['existing'], 0);
    } else if($_POST['isexisting']=='yes') {
      echo "Not Insured";
    } else if($_POST['project'] == 'Description of Works'){
      echo "Not Applicable (quick quote)";
    } else {
      echo "Not Applicable";
    }
    echo "</td>
  </tr>
  <tr>
    <td>Public Liability:</td><td>$".number_format($_POST['liability'], 0)."</td>
  </tr>
  <tr>
    <td>Building Materials:</td><td>";
    if($_POST['strawbale']=='yes'){
      echo "Strawbale";
    } else {
      echo "other than strawbale";
    }
    echo "</td>
  </tr>
  <tr>
    <td>Island without road access?:</td><td>".$_POST['island']."</td>
  </tr>
  <tr>
    <td>Located above 26th parallel?:</td><td>".$_POST['p26th']."</td>
  </tr>
</table>
</div>
<div class=midmid2>
  SINGLE PROJECT CONSTRUCTION INSURANCE<BR>
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
<a href='docs/sp.pdf' target=_blank><div class=pdftext><div class=docimage></div></div><div class=pdftext>Policy Wording</div></a>
&nbsp;
<a href='docs/PDF/PROPOSAL.php' target=_blank><div class=pdftext><div class=docimage></div></div><div class=pdftext>Proposal Form</div></a>
<br clear=all>
<br>
<form name=coverform method=post action='cover.php'>
<input type=hidden name=id value='".$_POST['id']."'>";
if(!isset($oldquote)){
  echo "<input type=button class='submit getcover' value='get covernote &rarr;' onclick=\"";
  if($_SESSION['onoffswitch'] == 'quick') {
    echo "alert('Not all information has been entered. Click ok to update quote first.');editform.upgrade.value=1;editform.submit();\">";
  } else {
    echo "coverform.submit();\">";
  }
} else {
  echo "<i>".$oldquote."</i>";
}
echo "
</form>
<form name=editform method=post action='spquote.php'>
<input type=hidden name=upgrade value=0>
<input type=hidden name=id value='".$_POST['id']."'>
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