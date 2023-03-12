<?php
include('Phpmailer.php');
$p=$_POST['p1'];
if($p!='C@1cu1@t0r5')
{
	echo "<html>
<head>
<title>Enter password</title>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'</script>
<script>
$(window).bind('beforeunload', function(e) {
	return false;
});
</script>
</head>
<body bgcolor='black' style='color:white'>";
	echo "<script>alert('Incorrect password.')</script>";
	include("Finished.php");
}
else
{
	session_start();
	echo "<html>
<head>
<title>Quotation</title>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
<script>
$(window).bind('beforeunload', function(e) {
	return false;
});
</script>
</head>
<body bgcolor='black' style='color:white'>";
	$mail = new PHPMailer();
$mail->SMTPDebug = 1;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "mail.bnew.co.uk";
//Set this to true if SMTP host requires authentication to send email                    
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "false";                           
//Set TCP port to connect to 
$mail->Port = 25;
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "calculator@bnew.co.uk";          
$mail->Password = "Apple4ss!";
$mail->IsHTML(true);
$mail->Subject = "Room Details";
$mes="Name:".$_SESSION['n']."<br>";
$mes.="House number/name:".$_SESSION['h']."<br>";
$mes.="Post code:".$_SESSION['po']."<br>";
$mes.="Phone number:".$_SESSION['ph']."<br>";
$mail->Body=$mes;
unset($mes);
	$tot=0;
	$rt=0;
	for($i=1;$i<=$_SESSION['ro'];$i++)
	{
		if(isset($mes))
		{
		$mes.= "<b>Heating to be put onto:".$_SESSION['w'.$i]."</b><br>";
		}
		else
		{
			$mes= "<b>Heating to be put onto:".$_SESSION['w'.$i]."</b><br>";
		}
	$mes.= "Name of room:".$_SESSION['nr'.$i]."<br>";
	$mes.="Type of room:".$_SESSION['ss'.$i]."<br>";
	$mes.= "Length of room:".$_SESSION['lr'.$i]."<br>";
	$mes.="Width of room:".$_SESSION['wr'.$i]."<br>";
	$mes.="Heat Loss:".round($_SESSION['hr'.$i])." watts<br>";
		$sqm=$_SESSION['ar'.$i];
		$mes.="Area of room(in square meter):".round($sqm,2)."<br>";
$mes.="<table border=1 cellspacing=0 cellpadding=10>";
		$subt=0;
		$mes.="<tr><td>Area Cost for Room";
		$sqp=$_SESSION['psq'.$i];
		if($_SESSION['ss'.$i]=='Passive House')
		{
			$k=10;
		}
		else if($_SESSION['ss'.$i]=='Less than 5 years old')
		{
			$k=30;
		}
		else if($_SESSION['ss'.$i]=='Well insulated, loft, wall, and double glazing')
		{
			$k=40;
		}
		else if($_SESSION['ss'.$i]=='Some insulation')
		{
			$k=50;
		}
		else if($_SESSION['ss'.$i]=='Low insulation')
		{
			$k=80;
		}
		else
		{
			$k=100;
		}
		$ac=round($sqm*$k*0.8*$sqp);
		$subt+=$ac;
		$mes.="<td>&pound".$ac." = $sqm sq. meter * $k kWh * 0.8 * &pound$sqp";
		if($_SESSION['w'.$i]=='Floor'||$_SESSION['w'.$i]=='Ceiling')
		{
			$st=ceil($_SESSION['hr'.$i]/300.0);
			$mes.="<tr><td>No. of sheets";
			$mes.="<td>".$st;
			$mes.="<tr><td>Cable cost";
			$cs=round($st*28);
			$subt+=$cs;
			$mes.="<td>&pound".$cs." = &pound28 per sheet * $st sheets";
		}
		else if($_SESSION['w'.$i]=='Wall' || $_SESSION['w'.$i]=='Under Tiles')
		{
			$st=ceil($_SESSION['hr'.$i]/150.0);
			$mes.="<tr><td>No. of sheets";
			$mes.="<td>".$st;
			$mes.="<tr><td>Cable cost";
			$cs=round($st*28);
			$subt+=$cs;
			$mes.="<td>&pound".$cs." = &pound28 per sheet * $st sheets";
		}
		$mes.="<tr><td>Underfloor foil insulation";
		$fi=round($sqm*3);
		$subt+=$fi;
		$mes.="<td>&pound".$fi." = &pound3 * $sqm sq. meter";
		$mes.="<tr><td>Thermostat<td>&pound"."32";
		$subt+=32;
		$mes.="<tr><td>Installation Cost";
		$ic=round($_SESSION['ip'.$i]);
		$subt+=$ic;
		$mes.="<td>&pound".$ic;
		$mes.="<tr><td><b>Total Room Cost</b>";
		$mes.="<td><b>&pound".$subt."</b>";
		$tot+=$subt;
		$mes.="<tr><td>Yearly running cost";
		$rc=round($sqm*0.8*8*100*0.12);
		$rt+=$rc;
		$mes.="<td>&pound".$rc." = $sqm sq. meter * 0.8 * 8 * 100 * &pound0.12</table><br>";
	}
	$mes.="<table border=1 cellspacing=0 cellpadding=10><tr><td><b>Total cost(excluding running cost)</b><td><b>&pound".$tot."</b>";
	$mes.="<tr><td><b>Total running cost</b><td><b>&pound".$rt."</b>";
	$mes.="<tr><td><b>Total cost</b><td><b>&pound".($tot+$rt)."</b></table>";
	echo $mes;
$mail->Body .= $mes;
$mail->SetFrom("calculator@bnew.co.uk");
$mail->AddAddress("info@bnew.co.uk");
if($mail->Send()) {
echo "<script>alert('Email sent successfully.')</script>";
}
else
{
 echo 'Mail error: '.$mail->ErrorInfo; 
}
	session_destroy();
}
?>