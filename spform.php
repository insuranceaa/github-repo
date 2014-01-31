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

if($_POST['upgrade']=='1'){
  $quickchecked = "";
  $_SESSION['onoffswitch'] = "";
}

echo "
<div id=page1_content class='content inside'>

<form id=quoteform name=spcalcform action=spcalc.php method=post>
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
<input type=text name=insured placeholder='Name of Insured' value=\"".$_SESSION['insured']."\"><br>

Project Location<br>
<div id=xp>
<input type=text name=address1 placeholder='Street Address' value=\"".$_SESSION['address1']."\"><br>
<input type=text name=suburb placeholder='Suburb' value=\"".$_SESSION['suburb']."\">
</div>
<select id=state name=state>
  <option>State</option>
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
<input type=number name=postcode placeholder='Postcode' value='".$_SESSION['postcode']."'>
</div><br clear=all>
Project Details<br>
<div id=xp6>
<select id=project name=project onchange=\"hideshowex('existing')\">
  <option>Description of Works</option>
  <option value='Single_Dwelling' ".$Single_Dwellingselected.">New Dwelling</option>
  <option value='Single_Dwelling_and_Pool' ".$Single_Dwelling_and_Poolselected.">New Dwelling and Pool</option>
  <option value='Structural_Alteration_Addition' ".$Structural_Alteration_Additionselected.">Alteration/Addition</option>
  <option value='Structural_Alteration_Addition_and_Pool' ".$Structural_Alteration_Addition_and_Poolselected.">Alteration/Addition and Pool </option>
  <option value='Non_Structural_Improvements' ".$Non_Structural_Improvementsselected.">Non-Structural Improvements</option>
  <option value='Relocated_Dwelling' ".$Relocated_Dwellingselected.">Relocated Dwelling</option>
  <option value='Kit_Home' ".$Kit_Homeselected.">Kit Home</option>
  <option value='Unit_Duplex_Villa' ".$Unit_Duplex_Villaselected.">Unit/Duplex/Villa</option>
  <option value='Swimming_Pool' ".$Swimming_Poolselected.">Swimming Pool</option>
  <option value='Shed' ".$Shedselected.">Shed</option>
  <option value='Transportable_Dwelling' ".$Transportable_Dwellingselected.">Transportable Dwelling</option>
  <option value='Garage_Carport' ".$Garage_Carportselected.">Garage/Carport</option>
  <option value='Outbuilding' ".$Outbuildingselected.">Outbuilding/Granny-Flat</option>
</select><br>
</div>
<input type=number id=value name=value placeholder='$ Project Value' value='".$_SESSION['value']."'><br>
<input type=hidden name=isexisting value=''>";

if($_SESSION['commenced'] == 'yes') {
  $comyeschecked = "checked";
} else {
  $comnochecked = "checked";
}

echo "
<ul class=radio-group><li>Has any Work Commenced? *</li><li><input id=op1 type=radio name=commenced value=no ".$comnochecked."><label for=op1><span><span></span></span>no</label></li><li><input id=op2 type=radio name=commenced value=yes ".$comyeschecked."><label for=op2><span><span></span></span>yes</label></li></ul><br clear=all>
<br>";

echo "
<div id=comdesc>*<i>The Project is only deemed to have commenced if it is beyond the slab / foundation construction stage.</i></div><br>
<div id=existing>
<input type=number name=existing placeholder='$ Existing Structures Value' value='".$_SESSION['existing']."'><br>
(<i>only enter a value above if you wish to insure this</i>)<br>
<br>
</div>
<a href='javascript:;' id='page2' class='links'><div class=slidelinkright></div></a>
</div>

<div id=page2_content class='content hidden'>
<div id=xp4>
<div id=xp3>
<input type=number name=plant placeholder='$ Plant, Tools & Equipment' value='".$_SESSION['plant']."'><br>
(<i>only enter a value above if you wish to insure this</i>)<br>
<br>
</div></div>";

if(!isset($_SESSION['liability'])){
  $checked5000000 = "checked";
} else {
  $temp = "checked".$_SESSION['liability'];
  $$temp = "checked";
}

echo "
Public Liability Sum Insured<ul class=radio-group><li><input id=p1 type=radio name=liability value=none ".$checkednone."><label for=p1><span><span></span></span>none</label></li><li><input id=p2 type=radio name=liability value=5000000 ".$checked5000000."><label for=p2><span><span></span></span>$5m</label></li><li><input id=p3 type=radio name=liability value=10000000 ".$checked10000000."><label for=p3><span><span></span></span>$10m</label></li><li><input id=p4 type=radio name=liability value=20000000 ".$checked20000000."><label for=p4><span><span></span></span>$20m</label></li></ul>
<br clear=all> <br>";

if($_SESSION['strawbale'] != 'yes') {
  $strawnochecked = "checked";
} else {
  $strawyeschecked = "checked";
}
if($_SESSION['island'] != 'yes') {
  $islandnochecked = "checked";
} else {
  $islandyeschecked = "checked";
}
if($_SESSION['p26th'] != 'yes') {
  $p26thnochecked = "checked";
} else {
  $p26thyeschecked = "checked";
}

echo "
<div id=xp5>
Will the Project include use of 'straw bale' material?<br>
<ul class=radio-group><li><input id=mop1 type=radio name=strawbale value=no ".$strawnochecked."><label for=mop1><span><span></span></span>no</label></li><li><input id=mop2 type=radio name=strawbale value=yes ".$strawyeschecked."><label for=mop2><span><span></span></span>yes</label></li></ul>
<br clear=all> <br>
Is the Project on an island without road access?<br>
<ul class=radio-group><li><input id=rop1 type=radio name=island value=no ".$islandnochecked."><label for=rop1><span><span></span></span>no</label></li><li><input id=rop2 type=radio name=island value=yes ".$islandyeschecked."><label for=rop2><span><span></span></span>yes</label></li></ul>
<br clear=all> <br>
Is the Project located above the 26th parallel? (WA,NT,QLD)<br>
<ul class=radio-group><li><input id=top1 type=radio name=p26th value=no ".$p26thnochecked."><label for=top1><span><span></span></span>no</label></li><li><input id=top2 type=radio name=p26th value=yes ".$p26thyeschecked."><label for=top2><span><span></span></span>yes</label></li></ul><br clear=all>
<br>";

if(!isset($_SESSION['commission'])){
  $commission15 = "checked";
} else {
  $temp = "commission".$_SESSION['commission'];
  $$temp = "checked";
}

echo "
</div>
Commission Required<ul class=radio-group><li><input id=c1 type=radio name=commission value=0 ".$commission0."><label for=c1><span><span></span></span>0% (net)</label></li><li><input id=c2 type=radio name=commission value=10 ".$commission10."><label for=c2><span><span></span></span>10%</label></li><li><input id=c3 type=radio name=commission value=15 ".$commission15."><label for=c3><span><span></span></span>15%</label></li><li><input id=c4 type=radio name=commission value=20 ".$commission20."><label for=c4><span><span></span></span>20%</label></li></ul><br>
<br>";

if(!isset($_SESSION['round']) || ($_SESSION['round']=="yes")){
  $roundchecked = "checked";
}

echo "
<input type=number name=brokerfee placeholder='$ Broker Fee (inc gst) -optional' value='".$_SESSION['brokerfee']."'><br>
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

if($_POST['upgrade']=='1'){
  echo "<script type='text/javascript'>
  hideshow('xp');hideshow('xp2');hideshow('xp3');hideshow('xp4');hideshow('xp5');hideshow('xp6');hideshowex('existing');
  </script>";
}
?>