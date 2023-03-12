<?php
include('Phpmailer.php');
include('class.smtp.php');
if(isset($_POST['p1']))
{
	$p=$_POST['p1'];
}
else
{
	header("Location:Cust_Details.php");
	die();
}
if($p!='C@1cu1@t0r5')
{
	echo "<script>alert('Incorrect password.')</script>";
	include("Finished.php");
	die();
}
else
{
	session_start();
	if(!isset($_SESSION['n']))
	{
		header("Location:Cust_Details.php");
		die();
	}
	?>
<html>
<head>
<title>Quotation</title>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
</head>
<body style='color:gray;'>
<img src='Logo.png' style='width:200px;height:100px; display:block;margin-left: auto;margin-right: auto'><br>
<?php
$mail = new PHPMailer();
$mail->SMTPDebug = 1;
$mail->isSMTP();                         
/*$mail->Host = "localhost";
$mail->SMTPSecure = "false";
$mail->Port = 25;
$mail->SMTPAuth = true; */
$mail->Host = "mail.bnew.co.uk";
$mail->SMTPSecure = "tls"; 
$mail->Port = 587;
$mail->SMTPAuth = true;   
$mail->Username = "calculator@bnew.co.uk";          
$mail->Password = "Apple4ss!";
$mail->IsHTML(true);
$mail->Subject = "Room Details";
$mes="<table cellpadding=10>";
$mes.="<tr><td>Name<td>".$_SESSION['n'];
$mes.="<tr><td>House number/name<td>".$_SESSION['h'];
$mes.="<tr><td>Post code<td>".$_SESSION['po'];
$mes.="<tr><td>Phone number<td>".$_SESSION['ph']."</table>";
$mail->Body=$mes;
unset($mes);
$mes="<table align=center cellpadding=10>";
	$tot=0;
	$rt=0;
	for($i=1;$i<=$_SESSION['ro'];$i++)
	{
	$mes.= "<tr><td align=right><b>Name of room</b><td><b>".$_SESSION['nr'.$i]."</b>";
	$mes.="<tr><td align=right>Type of room<td>".$_SESSION['ss'.$i];
	$mes.="<tr><td align=right>Heating to be put onto<td>".$_SESSION['w'.$i];
	$mes.= "<tr><td align=right>Length of room<td>".$_SESSION['lr'.$i];
	$mes.="<tr><td align=right>Width of room<td>".$_SESSION['wr'.$i];
	$mes.="<tr><td align=right>Heat Loss<td>".round($_SESSION['hr'.$i])." kW";
		$sqm=$_SESSION['ar'.$i];
		$mes.="<tr><td align=right>Area of room<td>".round($sqm,2)." sq. meter";
		$subt=0;
		$sqp=$_SESSION['psq'.$i];
		if($_SESSION['w'.$i]=='Floor'||$_SESSION['w'.$i]=='Ceiling')
		{
			$st=ceil($_SESSION['hr'.$i]*1000.0/300.0);
			$mes.="<tr><td align=right>No. of sheets";
			$mes.="<td>".$st;
			$ac=round($st*$sqp);
			$subt+=$ac;
			$mes.="<tr><td align=right>Area Cost for Room<td>&pound;".$ac." = &pound;$sqp per sheet * $st sheets";
			$mes.="<tr><td align=right>Cable cost";
			$cs=round($st*28);
			$subt+=$cs;
			$mes.="<td>&pound;".$cs." = &pound;28 per sheet * $st sheets";
			$mes.="<tr><td align=right>Off Transformer Cost";
			$tc=ceil($st/4)*145;
			$subt+=$tc;
			$mes.="<td>&pound;".$tc." = &pound;145 per transformer * ".ceil($st/4)." transformers (each covering 4 sheets)";
		}
		else if($_SESSION['w'.$i]=='Wall' || $_SESSION['w'.$i]=='Under Tiles')
		{
			$st=ceil($_SESSION['hr'.$i]*1000.0/150.0);
			$mes.="<tr><td align=right>No. of sheets";
			$mes.="<td>".$st;
			$ac=round($st*$sqp);
			$subt+=$ac;
			$mes.="<tr><td align=right>Area Cost for Room<td>&pound;".$ac." = &pound;$sqp per sheet * $st sheets";
			$mes.="<tr><td align=right>Cable cost";
			$cs=round($st*28);
			$subt+=$cs;
			$mes.="<td>&pound;".$cs." = &pound;28 per sheet * $st sheets";
			$mes.="<tr><td align=right>Off Transformer Cost";
			$tc=ceil($st/8)*180;
			$subt+=$tc;
			$mes.="<td>&pound;".$tc." = &pound;180 per transformer * ".ceil($st/8)." transformers (each covering 8 sheets)";
		}
		$mes.="<tr><td align=right>Underfloor foil insulation";
		$fi=round($sqm*3);
		$subt+=$fi;
		$mes.="<td>&pound;".$fi." = &pound;3 * $sqm sq. meter";
		$mes.="<tr><td align=right>Thermostat<td>&pound;"."32";
		$subt+=32;
		$mes.="<tr><td align=right>Installation Cost";
		$ic=round($_SESSION['ip'.$i]);
		$subt+=$ic;
		$mes.="<td>&pound;".$ic;
		$mes.="<tr><td align=right><b>Total Room Cost</b>";
		$mes.="<td><b>&pound;".$subt."</b>";
		$tot+=$subt;
		$mes.="<tr><td align=right>Yearly running cost";
		$h=$_SESSION['hr'.$i];
		$rc=round(floatval($h)*1224*0.12);
		$rt+=$rc;
		$mes.="<td>&pound;".$rc." = ".floatval($h)." kW * 1224 * &pound;0.12";
	}
	$mes.="<tr><td align=right><b>Total cost(excluding running cost)</b><td><b>&pound;".$tot."</b>";
	$mes.="<tr><td align=right><b>Total running cost</b><td><b>&pound;".$rt."</b>";
	$mes.="<tr><td align=right><b>Total cost</b><td><b>&pound;".($tot+$rt)."</b></table>";
	echo $mes;
$mail->Body.= $mes;
$mail->SetFrom("calculator@bnew.co.uk");
//$mail->AddAddress(" clive.osborne@btinternet.com");
if($mail->Send()) {
echo "<script>alert('Email sent successfully.')</script>";
}
else
{
 echo "<script>alert('Mail error: ".$mail->ErrorInfo."')</script>"; 
}
}
?>
<div style="align:center;vertical-align:bottom;padding:5;">
Important: The values of Annual Energy and related results are approximate which are based on mathematical calculations. If the actual energy values and savings differ Bright New Energy World will not be in any way responsible.The difference is due to a variety of conditions including but not limited to correct interpretation of insulation in all areas.
</div>