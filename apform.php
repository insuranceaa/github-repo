<?php

if(!isset($_POST['id'])){
  foreach ($_SESSION as $key => $val) {
    if($val != $_SESSION['username'])
     $_SESSION["$key"] = null;
  }
}

if(!isset($_SESSION['username'])){
  echo "<script type='text/javascript'>
  window.location.assign('login.php');
  </script>";
} else { 


if(!isset($_SESSION['insured']) || ($_SESSION['onoffswitch']=='quick')){
  $quickchecked = "checked";
}

echo "
<div id=page1_content class='content inside'>

<form id=quoteform name=apcalcform action=apcalc.php method=post>
<input type=hidden name=id value='".$_POST['id']."'>
    &nbsp;&nbsp;<i>click to change quote type</i> <div class=onoffswitch>
    <input type=checkbox name=onoffswitch value=quick class=onoffswitch-checkbox id=myonoffswitch ".$quickchecked." onclick=\"hideshow('xp');hideshow('xp2');hideshow('xp3');hideshow('xp4');hideshow('xp5');hideshow('xp6');hideshowex('existing');\">
    <label class=onoffswitch-label for=myonoffswitch>
    <div class=onoffswitch-inner></div>
    <div class=onoffswitch-switch></div>
    </label>
    </div> 
<br clear=all><font size=1><br></font>";


$temp = strtolower($_SESSION['state'])."selected";
$$temp="selected";
$temp = $_SESSION['project']."selected";
$$temp="selected";

echo "
Insured<br>
<input type=text name=insured placeholder='Name of Insured *' value=\"".$_SESSION['insured']."\"><br> 
Business Location<br>
<div id=xp>
<input type=text name=address1 placeholder='Street Address' value=\"".$_SESSION['address1']."\"><br>
<input type=text name=suburb placeholder='Suburb' value=\"".$_SESSION['suburb']."\">
</div>
<select id=state name=state style='width:170px'>
  <option>State *</option>
  <option value='NSW' ".$nswselected.">NSW</option>
  <option value='QLD' ".$qldselected.">QLD</option>
  <option value='VIC' ".$vicselected.">VIC</option>
  <option value='ACT' ".$actselected.">ACT</option>
  <option value='SA' ".$saselected.">SA</option>
  <option value='NT' ".$ntselected.">NT</option>
  <option value='TAS' ".$tasselected.">TAS</option>
  <option value='WA' ".$waselected.">WA</option>
</select>
<div id=xp2>
<input type=number name=postcode placeholder='Postcode' value='".$_SESSION['postcode']."' style='width:170px'>&nbsp;
</div><br clear=all>
Turnover<br>
<input type=text id=turnover name=turnover placeholder='$ Turnover Estimate *' value='".$_SESSION['turnover']."'><br>
Max Project Value<br>
<input type=text id=value name=value placeholder='$ Maximum Project Value *' value='".$_SESSION['value']."'><br>
<input type=hidden name=isexisting value=''>";

echo "
<a href='javascript:;' id='page2' class='links'><div class=slidelinkright></div></a>
</div>

<div id=page2_content class='content hidden'>
<div id=xp4>
<div id=xp3>
Plant/Equipment<br>
<input type=number name=plant placeholder='$ Plant & Equipment (if required)' value='".$_SESSION['plant']."'><br>
<br>
</div></div>";

if($_SESSION['strawbale'] != 'yes') {
  $strawnochecked = "checked";
} else {
  $strawyeschecked = "checked";
}

if($_SESSION['p26th'] != 'yes') {
  $p26thnochecked = "checked";
} else {
  $p26thyeschecked = "checked";
}

echo "
<div id=xp5>
Will any Projects include use of 'straw bale' material?<br>
<ul class=radio-group><li><input id=mop1 type=radio name=strawbale value=no ".$strawnochecked."><label for=mop1><span><span></span></span>no</label></li><li><input id=mop2 type=radio name=strawbale value=yes ".$strawyeschecked."><label for=mop2><span><span></span></span>yes</label></li></ul>
<br clear=all> <br>
Will any Projects be located above the 26th parallel?<br>
<ul class=radio-group><li><input id=top1 type=radio name=p26th value=no ".$p26thnochecked."><label for=top1><span><span></span></span>no</label></li><li><input id=top2 type=radio name=p26th value=yes ".$p26thyeschecked."><label for=top2><span><span></span></span>yes</label></li></ul><br clear=all>
<br></div>";

if(!isset($_SESSION['liability'])){
  $p5000000selected = "selected";
} else {
  $temp = "p".$_SESSION['liability']."selected";
  $$temp = "selected";
}
if(!isset($_SESSION['excess'])){
  $e1000selected = "selected";
} else {
  $temp = "e".$_SESSION['excess']."selected";
  $$temp = "selected";
}

echo "
<select id=liability name=liability>
  <option value='0' ".$p0selected.">Public Liability : NIL</option>
  <option value='5000000' ".$p5000000selected.">Public Liability : $5,000,000</option>
  <option value='10000000' ".$p10000000selected.">Public Liability : $10,000,000</option>
  <option value='20000000' ".$p20000000selected.">Public Liability : $20,000,000</option>
</select><br clear=all><br>
<select id=excess name=excess>
  <option value='500' ".$e500selected.">Excess : $500</option>
  <option value='1000' ".$e1000selected.">Excess : $1,000</option>
  <option value='2500' ".$e2500selected.">Excess : $2,500</option>
  <option value='5000' ".$e5000selected.">Excess : $5,000</option>
  <option value='10000' ".$e10000selected.">Excess : $10,000</option>
  <option value='25000' ".$e25000selected.">Excess : $25,000</option>
</select><br clear=all> <br>
";



if(!isset($_SESSION['commission'])){
  $commission15 = "checked";
} else {
  $temp = "commission".$_SESSION['commission'];
  $$temp = "checked";
}

echo "

Commission Required<ul class=radio-group><li><input id=c1 type=radio name=commission value=0 ".$commission0."><label for=c1><span><span></span></span>0% (net)</label></li><li><input id=c2 type=radio name=commission value=10 ".$commission10."><label for=c2><span><span></span></span>10%</label></li><li><input id=c3 type=radio name=commission value=15 ".$commission15."><label for=c3><span><span></span></span>15%</label></li><li><input id=c4 type=radio name=commission value=20 ".$commission20."><label for=c4><span><span></span></span>20%</label></li></ul><br>
<br>";

//if(!isset($_SESSION['round']) || ($_SESSION['round']=="yes")){
//  $roundchecked = "checked";
//}

echo "
<input type=number name=brokerfee placeholder='$ Your Broker Fee (inc gst) -optional' value='".$_SESSION['brokerfee']."' onfocus='round.checked=true'><br>
<a href='javascript:;' id='page1' class='links'><div class=slidelinkleft></div></a>
<input type=checkbox name=round value=yes ".$roundchecked."> round premium up by adjusting broker fee.
<input type=button class='submit submitright' value='get quote' onclick='quoteform.submit();'>
</form>
</div>
";
}

if(!isset($quickchecked)) {
  echo "
  <script type='text/javascript'>
  hideshow('xp');hideshow('xp2');hideshow('xp3');hideshow('xp4');hideshow('xp5');hideshow('xp6');
  </script>
  ";
}

echo "
  <script type='text/javascript'>
  hideshowex('existing');
  </script>
  ";

echo "
<div class='centered' id='popup'>
	<div class='close_button' onclick=\"hideshow('popup');\">OK</div>
  <div id='popuptext'></div><br>
</div>";
?>