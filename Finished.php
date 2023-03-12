<?php
if(isset($_REQUEST['nr']))
{
session_start();
$_SESSION['nr'.$_SESSION['ro']]=$_REQUEST['nr'];
$_SESSION['lr'.$_SESSION['ro']]=$_REQUEST['lr'];
$_SESSION['wr'.$_SESSION['ro']]=$_REQUEST['wr'];
$_SESSION['hr'.$_SESSION['ro']]=$_REQUEST['hr'];
$_SESSION['w'.$_SESSION['ro']]=$_REQUEST['w'];
$_SESSION['ss'.$_SESSION['ro']]=$_REQUEST['ss'];
$_SESSION['ip'.$_SESSION['ro']]=$_REQUEST['ip'];
$_SESSION['psq'.$_SESSION['ro']]=$_REQUEST['psq'];
$_SESSION['ar'.$_SESSION['ro']]=$_REQUEST['ar'];
}
?>
<html>
<head>
<title>Enter password</title>
</head>
<body style="color:gray;">
<img src="Logo.png" style="width:200px;height:100px; display:block;margin-left: auto;margin-right: auto"><br>
<form name=f method=post action=Quotation.php>
<table align=center cellpadding=10>
<tr><td align=right>Password
<td><input type='password' name=p1>
<tr><td colspan=2 align=center>
<input type=submit value='CREATE QUOTATIONS' style="color:white;background-color:gray;border:0px solid white;padding:10px;">
</table>
</form>
</html>