<?php
session_start();
date_default_timezone_set('Australia/Perth');

if(!isset($_SESSION['username'])){
  echo "<script type='text/javascript'>
  window.location.assign('login.php');
  </script>";
} else { 


if(isset($_POST)) {
 foreach ($_POST as $key => $val) {
  if($val != "Submit")
   $_SESSION["$key"] = $val;
 }
}

require('fpdf.php');

$pdf = new FPDF();
$pdf->SetAutoPageBreak(1,10);

$pdf->AddPage();

$pdf->Image('../../images/logo.jpg',0,0,66,42);
//$pdf->Image('allrisklogo.gif',150,2,63,35);
$pdf->SetY(20);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(180,7,'SINGLE PROJECT',0,0,'C');$pdf->Ln();
$pdf->Cell(180,7,'CONSTRUCTION INSURANCE',0,0,'C');$pdf->Ln();
$pdf->Cell(180,7,'PROPOSAL FORM',0,0,'C');$pdf->Ln();
$pdf->Ln(3);
$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(150,150,150);
$pdf->Cell(17,5,'Privacy',1, 0, 1, 1);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->SetFillColor(200,230,255);
$pdf->SetFont('Arial','',7);
$pdf->Cell(180,4,'IAA respects your privacy and complies with the Privacy Act and the National Privacy Principles. A copy of our privacy policy is available from our website',TLR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,'www.insuranceaa.com.au',LR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,' ',BLR, 0,1,1,1);$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(150,150,150);
$pdf->Cell(50,5,'Your Duty of Disclosure',1, 0, 1, 1);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->SetFillColor(200,230,255);
$pdf->SetFont('Arial','',7);
$pdf->Cell(180,4,'Before you enter into a contract of general insurance with an insurer, you have a duty, under the Insurance Contracts Act 1984, to disclose to the insurer every ',TLR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,'matter that you know, or could reasonably be expected to know, that is relevant to the insurer\'s decision whether to accept the risk of the insurance and, if so, on ',LR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,'what terms (The information you provide on the Proposal Form forms a part of such matter). You have the same duty to disclose those matters to the insurer ',LR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,'before you renew, extend, vary or reinstate a contract of general insurance.',LR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,'Your duty however does not require disclosure of matter:',LR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,'- that diminishes the risk to be undertaken by the insurer;',LR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,'- that is of common knowledge;',LR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,'- that your insurer knows or, in the ordinary course of its business, ought to know; or',LR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,'- as to which compliance with your duty is waived by the insurer.',LR, 0,1,1,1);$pdf->Ln();
$pdf->SetFont('Arial','U',7);
$pdf->Cell(180,4,'Non Disclosure',LR, 0,1,1,1);$pdf->Ln();
$pdf->SetFont('Arial','',7);
$pdf->Cell(180,4,'If you fail to comply with your duty of disclosure, the insurer may be entitled to reduce its liability under the contract in respect of a claim or may cancel the contract.',LR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,'If your non-disclosure is fraudulent, the insurer may also have the option of avoiding the contract from its beginning.',LR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,' ',BLR, 0,1,1,1);$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(150,150,150);
$pdf->Cell(55,5,'Making Changes On This Form',1, 0, 1, 1);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->SetFillColor(200,230,255);
$pdf->SetFont('Arial','',7);
$pdf->Cell(180,4,'If any details are pre-completed on this form they are based on information you have provided previously.',TLR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,'Prior to signing and returning this form, you must check and make any changes necessary to ensure all information is correct.',LR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,' ',BLR, 0,1,1,1);$pdf->Ln();

$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(150,150,150);
$pdf->Cell(15,5,'Policy',1, 0, 1, 1);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->SetFillColor(200,230,255);
$pdf->SetFont('Arial','',6);
$pdf->Cell(180,4,'In order to understand the insurance you are applying for, you must read the Policy Wording. Anything you state in this proposal form may be included in the Policy.',TLR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,'If you include something which IAA does not want to insure, you will be advised and it will be excluded from the Policy we provide.',LR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,' ',BLR, 0,1,1,1);$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(150,150,150);
$pdf->Cell(25,5,'Contact Us',1, 0, 1, 1);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->SetFillColor(200,230,255);
$pdf->SetFont('Arial','',6);
$pdf->Cell(20,4,'Your Broker: ',TL, 0,1,1,1);
$pdf->Cell(160,4,'',TR, 0,1,1,1);$pdf->Ln();
$pdf->Cell(180,4,' ',BLR, 0,1,1,1);$pdf->Ln();
$pdf->Ln(3);
$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(150,150,150);
$pdf->Cell(180,5,'Proposer\'s Details',1, 0, 1, 1);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->SetFont('Arial','',7);
$pdf->Ln(3);
$pdf->Cell(30,4,'Name of Insured:');
$pdf->SetTextColor(12,17,128);
$pdf->Cell(150,4,$_SESSION['insured'],1);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Ln(3);
$pdf->Cell(30,4,'Address for Notices');$pdf->Ln();
$pdf->Cell(30,4,'from IAA');
$pdf->SetTextColor(12,17,128);
$pdf->SetXY(40,183);
$pdf->Cell(150,4,'Care of Broker',TLR);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->SetX(40);
$pdf->Cell(150,4,' ',BLR);$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'Have you either alone or in partnership or jointly with any other party;');$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'a) made a claim for any loss, damage or liability of a type to be insured');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 
if($madeaclaim == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($madeaclaim == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'b) had an insurer decline any claim, cancel any insurance policy or impose special terms to any insurance policy');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO');
if($declineorcancel == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($declineorcancel == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Ln();
$pdf->Ln(3);

$pdf->Cell(30,4,'c) been charged with or convicted of any criminal offence');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO');
if($convicted == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($declineorcancel == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Ln();
$pdf->Ln(3);

$pdf->Cell(30,4,'d) been declared bankrupt, insolvent, had a liquidator appointed or been a defendant in any civil court case');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 
if($bankrupt == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($bankrupt == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'(all answers will be regarded as answers by all parties related to the proposal)');$pdf->Ln();
$pdf->Ln(3);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(30,4,'If \'Yes\' to any of the above, please provide full details below or on an attached sheet:');$pdf->Ln();
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(12,17,128);
$pdf->Cell(180,4,$details_lines[0],TLR);$pdf->Ln();
$pdf->Cell(180,4,$details_lines[1],LR);$pdf->Ln();
$pdf->Cell(180,4,$details_lines[2],LR);$pdf->Ln();
$pdf->Cell(180,4,$details_lines[3],LR);$pdf->Ln();
$pdf->Cell(180,4,$details_lines[4],BLR);$pdf->Ln();


    // Position at 1.5 cm from bottom
    $pdf->SetY(-15);
    // Arial italic 8
    $pdf->SetFont('Arial','I',6);
    // Text color in gray
    $pdf->SetTextColor(128);
    // Page number
    $pdf->Cell(180,5,'Page '.$pdf->PageNo().' of 4',0,0,'C');
    
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);
$pdf->Ln();
$pdf->Ln();
$pdf->SetTextColor(255,255,255);
$pdf->Cell(180,5,'Insurance Details',1, 0, 1, 1);$pdf->Ln();
$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->SetFont('Arial','',8);
$pdf->Ln(2);
$pdf->Cell(30,4,'Commencement Date');
$pdf->SetTextColor(12,17,128);
$pdf->Cell(50,4,$startdate,1);
$pdf->SetTextColor(0);
$pdf->SetX(110);
$pdf->Cell(30,4,'Policy Duration: ');
$pdf->SetTextColor(12,17,128);
if($_SESSION['est_duration'] == '6_months') {
  $pdf->Cell(50,4,'6 months');$pdf->Ln();
} else {
  $pdf->Cell(50,4,'12 months');$pdf->Ln();
}
$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Ln(2);
$pdf->Cell(50,4,'Address of the Project:');
$pdf->SetTextColor(12,17,128);
$pdf->Cell(130,5,$_SESSION['site'],BTLR);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Ln(2);
$pdf->Cell(50,4,'Your Mailing Address:');
$pdf->SetTextColor(12,17,128);
$pdf->Cell(130,5,$PAddress,BTLR);$pdf->Ln();
$pdf->SetTextColor(0);

$pdf->Ln(2);
$pdf->Cell(50,4,'What does the Project entail (including');
$pdf->SetTextColor(12,17,128);
$pdf->Cell(130,4,$project_lines[0],TLR);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Cell(50,4,'but not limited to no. of storeys, no. of');
$pdf->SetTextColor(12,17,128);
$pdf->Cell(130,4,$project_lines[1],LR);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Cell(50,4,'basement levels, swimming pools,');
$pdf->SetTextColor(12,17,128);
$pdf->Cell(130,4,$project_lines[2],LR);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Cell(50,4,'commissioning period - if applicable)');
$pdf->SetTextColor(12,17,128);
$pdf->Cell(130,4,$project_lines[3],LR);$pdf->Ln();
$pdf->SetX(60);
$pdf->Cell(130,4,$project_lines[5],BLR);$pdf->Ln();
$pdf->Ln(2);
$pdf->SetTextColor(0);
$pdf->Cell(30,4,'Has any work already commenced on the Project to be insured?');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($commenced == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($commenced == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();

if($existing_value > 0) {
  if($commenced == 1) {
  $pdf->Ln(3);
  $pdf->SetFont('Arial','B',8);
  $pdf->Cell(30,4,"Please provide details of commencement date and value of work completed.");$pdf->Ln();
  $pdf->SetFont('Arial','',8);
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(180,4,$commenced_details_lines[0],TLR);$pdf->Ln();
  $pdf->Cell(180,4,$commenced_details_lines[1],LR);$pdf->Ln();
  $pdf->Cell(180,4,$commenced_details_lines[2],BLR);$pdf->Ln();
  $pdf->SetTextColor(0);
  }

$pdf->Ln(2);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(30,4,"*** Please also attach current photo/s of the existing structure.");$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->SetFont('Arial','',8);
}

$pdf->Ln(2);
$pdf->Cell(30,4,'Will any alterations or refurbishments to Existing Structures be undertaken?');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($alterations == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($alterations == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(2);
$pdf->Cell(50,4,"If 'Yes', describe the existing structure");
$pdf->SetTextColor(12,17,128);
$pdf->Cell(130,4,$alteration_details_lines[0],TLR);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Cell(50,4,'and the work to be undertaken:');
$pdf->SetTextColor(12,17,128);
$pdf->Cell(130,4,$alteration_details_lines[1],LR);$pdf->Ln();
$pdf->SetX(60);
$pdf->Cell(130,4,$alteration_details_lines[2],LR);$pdf->Ln();
$pdf->SetX(60);
$pdf->Cell(130,4,$alteration_details_lines[3],BLR);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Ln(2);
$pdf->Cell(30,4,'Will Existing Structures be occupied during the Project?');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO');
 
if($occupied == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($occupied == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(2);
$pdf->Cell(30,4,'Is there any demolition involved?');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO');

if($demolition == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($demolition == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(2);
$pdf->SetX(20);
$pdf->Cell(30,4,'If \'Yes\' is the value of demolition greater than 25% of the Project value?');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if(($demo_over25 == 0) && ($demolition == 1)) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if(($demo_over25 == 1) && ($demolition == 1)){
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(2);
$pdf->SetX(30);
$pdf->Cell(30,4,"If 'Yes', describe:");
$pdf->SetTextColor(12,17,128);
$pdf->Cell(130,4,$demo_details_lines[0],TLR);$pdf->Ln();
$pdf->SetX(60);
$pdf->Cell(130,4,$demo_details_lines[1],LR);$pdf->Ln();
$pdf->SetX(60);
$pdf->Cell(130,4,$demo_details_lines[2],LR);$pdf->Ln();
$pdf->SetX(60);
$pdf->Cell(130,4,$demo_details_lines[3],BLR);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(50,4,"Describe the predominant geology of");
$pdf->SetTextColor(12,17,128);
$pdf->Cell(130,4,$geology_lines[0],TLR);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Cell(50,4,'the site (i.e. rock, sand etc)');
$pdf->SetTextColor(12,17,128);
$pdf->Cell(130,4,$geology_lines[1],LR);$pdf->Ln();
$pdf->SetX(60);
$pdf->Cell(130,4,$geology_lines[2],LR);$pdf->Ln();
$pdf->SetX(60);
$pdf->Cell(130,4,$geology_lines[3],BLR);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln(2);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,4,"Will the Project involve any of the following:");$pdf->Ln();
$pdf->Ln(3);
$pdf->SetFont('Arial','',8);
$pdf->Cell(30,4,'a) Blasting or explosives');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($blasting == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($blasting == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(2);
$pdf->Cell(30,4,'b) Demolition above 10 metres in height (other than internal');$pdf->Ln();
$pdf->Cell(30,4,'   non-structural demolition)');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($demo_over10m == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($demo_over10m == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(2);
$pdf->Cell(30,4,'c) Actual excavation work or work in an existing excavation deeper than');$pdf->Ln();
$pdf->Cell(30,4,'   5 metres');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($excavation == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($excavation == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(2);
$pdf->Cell(30,4,'d) Buildings or structures of historical significance');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO');
 
if($heritage == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($heritage == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(2);
$pdf->Cell(30,4,'e) Underground works, tunnels, shafts, mines or galleries');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($underground == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($underground == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(2);
$pdf->Cell(30,4,'f) Pipelines greater than 250 metres in length');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($pipelines == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($pipelines == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}


    // Position at 1.5 cm from bottom
    $pdf->SetY(-15);
    // Arial italic 8
    $pdf->SetFont('Arial','I',6);
    // Text color in gray
    $pdf->SetTextColor(128);
    // Page number
    $pdf->Cell(180,5,'Page '.$pdf->PageNo().' of 4',0,0,'C');
    
$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$pdf->SetTextColor(0);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(30,4,'g) Irrigation systems or dam work');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($irrigation == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($irrigation == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'h) Any work in, on, over or under a permanent body of water');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($nearwater == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($nearwater == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'i) Directional/horizontal drilling or boring greater than 50cm in diameter');$pdf->Ln();
$pdf->Cell(30,4,'   (other than piling/piers)');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($drilling == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($drilling == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'j) Swimming pools');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($pool == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($pool == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'k) Piling or substantial vibration');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($piling == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($piling == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'l) Removal or weakening of supports of any nature');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($removal_support == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($removal_support == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'m) Underpinning or shoring');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($underpinning == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($underpinning == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'n) Retaining walls greater than 15 metres in length and/or 1.5 metres in');$pdf->Ln();
$pdf->Cell(30,4,'   height');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($retainingwall == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($retainingwall == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'o) Excavation of underground services on site (other than to install');$pdf->Ln();
$pdf->Cell(30,4,'   new services)');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($underground_services == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($underground_services == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'p) Flame cutting or welding');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($welding == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($welding == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'q) Lowering of ground water');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($groundwater == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($groundwater == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'r) Technology which is of a prototype nature');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($technology == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($technology == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln();
$pdf->Ln(3);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(30,4,"If 'Yes' to any of the above questions, please describe");$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->SetTextColor(12,17,128);
$pdf->SetX(14);
$pdf->Cell(176,4,$details2_lines[0],TLR);$pdf->Ln();
$pdf->SetX(14);
$pdf->Cell(176,4,$details2_lines[1],LR);$pdf->Ln();
$pdf->SetX(14);
$pdf->Cell(176,4,$details2_lines[2],LR);$pdf->Ln();
$pdf->SetX(14);
$pdf->Cell(176,4,$details2_lines[3],LR);$pdf->Ln();
$pdf->SetX(14);
$pdf->Cell(176,4,$details2_lines[4],BLR);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Ln();
$pdf->Ln(3);
$pdf->SetFont('Arial','',9);
$pdf->Cell(30,4,"Please describe the property bordering the Project site and it's proximity to the work being undertaken");$pdf->Ln();
$pdf->SetTextColor(12,17,128);
$pdf->SetX(14);
$pdf->Cell(176,4,$bordering_lines[0],TLR);$pdf->Ln();
$pdf->SetX(14);
$pdf->Cell(176,4,$bordering_lines[1],LR);$pdf->Ln();
$pdf->SetX(14);
$pdf->Cell(176,4,$bordering_lines[2],LR);$pdf->Ln();
$pdf->SetX(14);
$pdf->Cell(176,4,$bordering_lines[3],LR);$pdf->Ln();
$pdf->SetX(14);
$pdf->Cell(176,4,$bordering_lines[4],BLR);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,'Is the interest of any financier of the Project to be noted?');
$pdf->SetX(140);
$pdf->Cell(10,4,'NO'); 

if($finance == 0) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}
$pdf->Cell(10,4,'YES'); 
if($finance == 1) {
  $pdf->SetTextColor(12,17,128);
  $pdf->Cell(5,4,'X',1);
  $pdf->SetTextColor(0);
} else {
  $pdf->Cell(5,4,' ',1);
}

$pdf->Ln();
$pdf->Ln();
$pdf->Ln(3);
$pdf->Cell(30,4,"If 'Yes', please state the financier and their particular interest (e.g. ABC Bank P/L, first mortgagee)");$pdf->Ln();
$pdf->SetTextColor(12,17,128);
$pdf->SetX(14);
$pdf->Cell(176,4,$financier_detail,TLR);$pdf->Ln();
$pdf->SetX(14);
$pdf->Cell(176,4,' ',LR);$pdf->Ln();
$pdf->SetX(14);
$pdf->Cell(176,4,' ',LR);$pdf->Ln();
$pdf->SetX(14);
$pdf->Cell(176,4,' ',LR);$pdf->Ln();
$pdf->SetX(14);
$pdf->Cell(176,4,' ',BLR);$pdf->Ln();
$pdf->Ln(3);

    // Position at 1.5 cm from bottom
    $pdf->SetY(-15);
    // Arial italic 8
    $pdf->SetFont('Arial','I',6);
    // Text color in gray
    $pdf->SetTextColor(128);
    // Page number
    $pdf->Cell(180,5,'Page '.$pdf->PageNo().' of 4',0,0,'C');

$pdf->AddPage();
$pdf->SetFont('Arial','B',9);
$pdf->Ln();
$pdf->Ln();
$pdf->SetTextColor(255,255,255);
$pdf->Cell(180,5,'Sums Insured and Insured Property',1, 0, 1, 1);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(30,4,'These are the maximum sums insured which will apply to the Project:');$pdf->Ln();
$pdf->Cell(30,4,'(If automatic amounts below are insufficient please specify another amount)');$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',7);
$pdf->Cell(30,4,'Section One - Material Damage');$pdf->Ln();
$pdf->SetX(117);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(30,4,'Sums Insured');$pdf->Ln();
$pdf->SetFont('Arial','',7);
$pdf->Cell(30,4,'1.02 Maximum Project Value');
$pdf->SetX(115);
$pdf->SetTextColor(12,17,128);
$pdf->Cell(65,5,'$ '.number_format($project_value),1);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Ln(2);
$pdf->Cell(30,4,'1.04 Existing Structures');
$pdf->SetX(115);
$pdf->SetTextColor(12,17,128);
$pdf->Cell(65,5,'$ '.number_format($existing_value),1);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Ln(2);
$pdf->Cell(30,4,'1.05 Contractor\'s Plant, Tools and Reusable Equipment');$pdf->Ln();
$pdf->Cell(30,4,'        (attach list of Plant and Equipment with their values or nominate an');$pdf->Ln();
$pdf->Cell(30,4,'        amount for non-specific items)');
$pdf->SetX(115);
$pdf->SetTextColor(12,17,128);
$pdf->Cell(65,5,'$ '.number_format($plant_value),1);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Ln(2);
$pdf->Cell(30,4,'1.06 Variations and Escalation (20% of the amount specified at 1.02 and');$pdf->Ln();
$pdf->Cell(30,4,'        1.03 is automatic)');
$pdf->SetX(115);
$pdf->Cell(65,5,'20% of the amount specified at 1.02 and 1.03',1);$pdf->Ln();
$pdf->Ln(2);
$pdf->Cell(30,4,'1.07 Removal of Debris (10% of the amount specified at 1.02, 1.03, 1.04');$pdf->Ln();
$pdf->Cell(30,4,'        and 1.05 is automatic)');
$pdf->SetX(115);
$pdf->Cell(65,5,'10% of the amount specified at 1.02, 1.03, 1.04 and 1.05',1);$pdf->Ln();
$pdf->Ln(2);
$pdf->Cell(30,4,'1.08 Professional Fees (10% of the amount specified at 1.02 and 1.03 is');$pdf->Ln();
$pdf->Cell(30,4,'        automatic)');
$pdf->SetX(115);
$pdf->Cell(65,5,'10% of the amount specified at 1.02 and 1.03',1);$pdf->Ln();
$pdf->Ln(2);
$pdf->Cell(30,4,'1.09 Expediting Costs (5% of the amount specified at 1.02,1.03 & 1.04 is');$pdf->Ln();
$pdf->Cell(30,4,'        automatic)');
$pdf->SetX(115);
$pdf->Cell(65,5,'5% of the amount specified at 1.02,1.03 & 1.04',1);$pdf->Ln();
$pdf->Ln(2);
$pdf->Cell(30,4,'1.10 Mitigation Costs (5% of the amount specified at 1.02, 1.03');$pdf->Ln();
$pdf->Cell(30,4,'        and 1.04 is automatic)');
$pdf->SetX(115);
$pdf->Cell(65,5,'5% of the amount specified at 1.02, 1.03 and 1.04',1);$pdf->Ln();
$pdf->Ln(2);
$pdf->Cell(30,4,'* The cost that would reasonably be incurred at commercial rates to perform the work under contract.');$pdf->Ln();
$pdf->Ln();
$pdf->Ln(2);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(30,4,'Section Two - Public Liability');$pdf->Ln();
$pdf->SetX(117);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(30,4,'Limits of Indemnity');$pdf->Ln();
$pdf->SetFont('Arial','',7);
$pdf->Cell(30,4,'6.01 Public Liability');
$pdf->SetX(115);
$pdf->SetTextColor(12,17,128);
$pdf->Cell(65,5,'$ '.number_format($liability_sum),1);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->Ln(2);
$pdf->Cell(30,4,'Sub Limits');
$pdf->SetX(117);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(30,4,'Limits of Indemnity');$pdf->Ln();
$pdf->SetFont('Arial','',7);
$pdf->Cell(30,4,'6.02 Vibration Weakening or the Removal of Support');
$pdf->SetX(115);
$pdf->Cell(65,5,'Auto Limit to match 6.01',1);$pdf->Ln();
$pdf->Ln(2);
$pdf->Cell(30,4,'6.03 Property in Care, Custody or Control');
$pdf->SetX(115);
$pdf->Cell(65,5,'$ 0',1);$pdf->Ln();
$pdf->SetFont('Arial','B',7);
$pdf->Ln(2);
$pdf->Ln();
$pdf->SetTextColor(255,255,255);
$pdf->Cell(180,5,'Declaration and Signature',1, 0, 1, 1);$pdf->Ln();
$pdf->SetTextColor(0);
$pdf->SetFont('Arial','',7);
$pdf->Ln(2);
$pdf->Cell(30,4,'On behalf of the proposed insured, I/we declare that the answers given herein are in every respect true and correct and that I/we have not withheld any information');$pdf->Ln();
$pdf->Cell(30,4,'likely to affect the acceptance of this insurance and that I/we have read and understood the Policy document. I/we have sought clarification of any aspects of the');$pdf->Ln();
$pdf->Cell(30,4,'proposal form or Policy document I/we did not understand.');$pdf->Ln();
$pdf->Ln(2);
$pdf->Cell(30,4,'I/we acknowledge that IAA may give to, and obtain from, other insurers, personal information of mine/ours relating to this insurance as well as insurance claims');$pdf->Ln();
$pdf->Cell(30,4,'information obtained during the course of any contract I/we have with IAA.');$pdf->Ln();
$pdf->Ln(2);
$pdf->Cell(30,4,'I/we also acknowledge that IAA are not obliged to automatically accept the insurance proposed above, however IAA will formally advise me/us of the extent to');$pdf->Ln();
$pdf->Cell(30,4,'which they are prepared to offer insurance by quotation, schedule or otherwise in writing.');$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',7);
$pdf->Cell(20,4,'Signature');
$pdf->Cell(65,5,' ',TLR);
$pdf->Cell(5,5,' ');
$pdf->Cell(20,4,'Date');
$pdf->Cell(65,5,' ',TLR);$pdf->Ln();
$pdf->SetX(30);
$pdf->Cell(65,5,' ',BLR);
$pdf->Cell(25,5,' ');
$pdf->Cell(65,5,' ',BLR);$pdf->Ln();
$pdf->Ln(2);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(20,4,'Name');
$pdf->SetFont('Arial','',7);
$pdf->SetTextColor(12,17,128);
$pdf->Cell(65,5,$name,TLR);$pdf->Ln();
$pdf->SetX(30);
$pdf->Cell(65,5,' ',BLR);

$pdf->Output();

}
?>