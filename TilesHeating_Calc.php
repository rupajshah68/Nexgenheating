<?php
if(isset($_REQUEST['hid']))
{
unset($_REQUEST['hid']);
if(isset($_SESSION))
{
session_unset();
}
session_start();
$_SESSION['ro']=1+"";
if(isset($_REQUEST['na']))
{
$_SESSION['n']=$_REQUEST['na'];
}
else
{
$_SESSION['n']="";
}
if(isset($_REQUEST['h']))
{
$_SESSION['h']=$_REQUEST['h'];
}
else
{
$_SESSION['h']="";
}
if(isset($_REQUEST['po']))
{
$_SESSION['po']=$_REQUEST['po'];
}
else
{
$_SESSION['po']="";
}
if(isset($_REQUEST['ph']))
{
$_SESSION['ph']=$_REQUEST['ph'];
}
else
{
$_SESSION['ph']="";
}
}
else
{
session_start();
$a=$_SESSION['ro'];
$_SESSION['nr'.$a]=$_REQUEST['nr'];
$_SESSION['lr'.$a]=$_REQUEST['lr'];
$_SESSION['wr'.$a]=$_REQUEST['wr'];
$_SESSION['hr'.$a]=$_REQUEST['hr'];
$_SESSION['w'.$a]=$_REQUEST['w'];
$_SESSION['ar'.$a]=$_REQUEST['ar'];
$_SESSION['ss'.$a]=$_REQUEST['ss'];
$_SESSION['ip'.$a]=$_REQUEST['ip'];
$_SESSION['psq'.$a]=$_REQUEST['psq'];
$_SESSION['ro']=(intval($_SESSION['ro'])+1)+"";
}
?>
<html>
<head>
<title>Room Details</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php
echo
"<script>
var h
function area() {
width = Number(document.roomarea.width.value)
depth = Number(document.roomarea.depth.value)
if(roomarea.unit[0].checked) {
measure = 'Square Metres'
document.roomarea.measure.value=measure
result = (width*depth)
result = result.toFixed(4)
document.roomarea.result.value=result
measurea = 'Square Yards'
document.roomarea.measurea.value=measurea
resulta = ((depth*1.09361296)*(width*1.09361296))
resulta = resulta.toFixed(4)
document.roomarea.resulta.value=resulta
measureb = 'Square Feet'
document.roomarea.measureb.value=measureb
resultb = ((depth*3*1.09361296)*(width*3*1.09361296))
resultb = resultb.toFixed(4)
document.roomarea.resultb.value=resultb
measurec = 'Square Inches'
document.roomarea.measurec.value=measurec
resultc = ((depth*12*3*1.09361296)*(width*12*3*1.09361296))
resultc = resultc.toFixed(4)
document.roomarea.resultc.value=resultc
measured = 'Square Centimetres'
document.roomarea.measured.value=measured
resultd = ((depth*100)*(width*100))
resultd = resultd.toFixed(4)
document.roomarea.resultd.value=resultd
measuree = 'Square Millimetres'
document.roomarea.measuree.value=measuree
resulte = ((depth*1000)*(width*1000))
resulte = resulte.toFixed(4)
document.roomarea.resulte.value=resulte
}
else if	(roomarea.unit[1].checked) {
measure = 'Square Yards'
document.roomarea.measure.value=measure
result = (width*depth)
result = result.toFixed(4)
document.roomarea.result.value=result
measurea = 'Square Feet'
document.roomarea.measurea.value=measurea
resulta = ((depth*3)*(width*3))
resulta = resulta.toFixed(4)
document.roomarea.resulta.value=resulta
measureb = 'Square Inches'
document.roomarea.measureb.value=measureb
resultb = ((depth*12*3)*(width*12*3))
resultb = resultb.toFixed(4)
document.roomarea.resultb.value=resultb
measurec = 'Square Metres'
document.roomarea.measurec.value=measurec
resultc = ((depth*.9144)*(width*.9144))
resultc = resultc.toFixed(4)
document.roomarea.resultc.value=resultc
measured = 'Square Centimetres'
document.roomarea.measured.value=measured
resultd = ((depth*914.4)*(width*914.4))
resultd = resultd.toFixed(4)
document.roomarea.resultd.value=resultd
measuree = 'Square Millimetres'
document.roomarea.measuree.value=measuree
resulte = ((depth*9144)*(width*9144))
resulte = resulte.toFixed(4)
document.roomarea.resulte.value=resulte
}

else if	(roomarea.unit[2].checked) {
measure = 'Square Feet'
document.roomarea.measure.value=measure
result = (width*depth)
result = result.toFixed(4)
document.roomarea.result.value=result
measurea = 'Square Inches'
document.roomarea.measurea.value=measurea
resulta = ((depth*12)*(width*12))
resulta = resulta.toFixed(4)
document.roomarea.resulta.value=resulta
measureb = 'Square Yards'
document.roomarea.measureb.value=measureb
resultb = ((depth/3)*(width/3))
resultb = resultb.toFixed(4)
document.roomarea.resultb.value=resultb
measurec = 'Square Metres'
document.roomarea.measurec.value=measurec
resultc = ((depth/3.28084)*(width/3.28084))
resultc = resultc.toFixed(4)
document.roomarea.resultc.value=resultc
measured = 'Square Centimetres'
document.roomarea.measured.value=measured
resultd = ((depth/3.28084)*100)*((width/3.28084)*100)
resultd = resultd.toFixed(4)
document.roomarea.resultd.value=resultd
measuree = 'Square Millimetres'
document.roomarea.measuree.value=measuree
resulte = ((depth/3.28084)*1000)*((width/3.28084)*1000)
resulte = resulte.toFixed(4)
document.roomarea.resulte.value=resulte
}
else if	(roomarea.unit[3].checked) {
measure = 'Square Inches'
document.roomarea.measure.value=measure
result = (width*depth)
result = result.toFixed(4)
document.roomarea.result.value=result
measurea = 'Square Feet'
document.roomarea.measurea.value=measurea
resulta = ((depth/12)*(width/12))
resulta = resulta.toFixed(4)
document.roomarea.resulta.value=resulta
measureb = 'Square Yards'
document.roomarea.measureb.value=measureb
resultb = ((depth/36)*(width/36))
resultb = resultb.toFixed(4)
document.roomarea.resultb.value=resultb
measurec = 'Square Metres'
document.roomarea.measurec.value=measurec
resultc = ((depth/39.3700787)*(width/39.3700787))
resultc = resultc.toFixed(4)
document.roomarea.resultc.value=resultc
measured = 'Square Centimetres'
document.roomarea.measured.value=measured
resultd = ((depth/0.393700787)*(width/0.393700787))
resultd = resultd.toFixed(4)
document.roomarea.resultd.value=resultd
measuree = 'Square Millimetres'
document.roomarea.measuree.value=measuree
resulte = ((depth/0.0393700787)*(width/0.0393700787))
resulte = resulte.toFixed(4)
document.roomarea.resulte.value=resulte
}
else if	(roomarea.unit[4].checked) {
measure = 'Square Centimetres'
document.roomarea.measure.value=measure
result = (width*depth)
result = result.toFixed(4)
document.roomarea.result.value=result
measurea = 'Square Metres'
document.roomarea.measurea.value=measurea
resulta = ((depth/100)*(width/100))
resulta = resulta.toFixed(4)
document.roomarea.resulta.value=resulta
measureb = 'Square Millimetres'
document.roomarea.measureb.value=measureb
resultb = ((depth*10)*(width*10))
resultb = resultb.toFixed(4)
document.roomarea.resultb.value=resultb
measurec = 'Square Inches'
document.roomarea.measurec.value=measurec
resultc = ((depth/2.54)*(width/2.54))
resultc = resultc.toFixed(4)
document.roomarea.resultc.value=resultc
measured = 'Square Feet'
document.roomarea.measured.value=measured
resultd = ((depth/30.48)*(width/30.48))
resultd = resultd.toFixed(4)
document.roomarea.resultd.value=resultd
measuree = 'Square Yards'
document.roomarea.measuree.value=measuree
resulte = ((depth/91.44)*(width/91.44))
resulte = resulte.toFixed(4)
document.roomarea.resulte.value=resulte
}
if(measure=='Square Metres')
{
h=parseFloat(result)
if(document.roomarea.s1.selectedIndex==0)
{
h*=10
}
else if(document.roomarea.s1.selectedIndex==1)
{
h*=25
}
else if(document.roomarea.s1.selectedIndex==2)
{
h*=45
}
else if(document.roomarea.s1.selectedIndex==3)
{
h*=60
}
else if(document.roomarea.s1.selectedIndex==4)
{
h*=70
}
else if(document.roomarea.s1.selectedIndex==5)
{
h*=90
}
document.roomarea.heat.value=(h/1000).toFixed(4).toString()
}
else if(measurea=='Square Metres')
{
h=parseFloat(resulta)
if(document.roomarea.s1.selectedIndex==0)
{
h*=10
}
else if(document.roomarea.s1.selectedIndex==1)
{
h*=25
}
else if(document.roomarea.s1.selectedIndex==2)
{
h*=45
}
else if(document.roomarea.s1.selectedIndex==3)
{
h*=60
}
else if(document.roomarea.s1.selectedIndex==4)
{
h*=70
}
else if(document.roomarea.s1.selectedIndex==5)
{
h*=90
}
document.roomarea.heat.value=(h/1000).toFixed(4).toString()
}
else if(document.roomarea.measurec.value=='Square Metres')
{
h=parseFloat(resultc)
if(document.roomarea.s1.selectedIndex==0)
{
h*=10
}
else if(document.roomarea.s1.selectedIndex==1)
{
h*=25
}
else if(document.roomarea.s1.selectedIndex==2)
{
h*=45
}
else if(document.roomarea.s1.selectedIndex==3)
{
h*=60
}
else if(document.roomarea.s1.selectedIndex==4)
{
h*=70
}
else if(document.roomarea.s1.selectedIndex==5)
{
h*=90
}
document.roomarea.heat.value=(h/1000).toFixed(4).toString()
}
if(measure=='Square Metres')
{
h=parseFloat(result)
}
else if(measurea=='Square Metres')
{
	h=parseFloat(resulta)
}
else if(measurec=='Square Metres')
{
	h=parseFloat(resultc)
}
}
</script>";
?>
<script>
function add()
{
if(roomarea.r.value!=null && roomarea.depth.value!=null && roomarea.width.value!=null && roomarea.ip.value!=null && roomarea.psq.value!=null && roomarea.r.value!='' && roomarea.depth.value!='' && roomarea.width.value!='' && roomarea.unit.value!='' && roomarea.ip.value!='' && roomarea.psq.value!='')
{
window.location='TilesHeating_Calc.php?nr='+roomarea.r.value+'&lr='+roomarea.depth.value+' '+roomarea.unit.value+'&wr='+roomarea.width.value+' '+roomarea.unit.value+'&hr='+roomarea.heat.value+' kW&w='+roomarea.w.value+'&ar='+h+'&ss='+roomarea.s1.value+'&ip='+roomarea.ip.value+'&psq='+roomarea.psq.value
}
else
{
	alert('Please input room name, width of room, length of room, price per sheet and installation price for the room in order to proceed.')
}
}
function f()
{
if(roomarea.r.value!=null && roomarea.depth.value!=null && roomarea.width.value!=null && roomarea.ip.value!=null && roomarea.psq.value!=null && roomarea.r.value!='' && roomarea.depth.value!='' && roomarea.width.value!='' && roomarea.unit.value!='' && roomarea.ip.value!='' && roomarea.psq.value!='')
{
window.location='Finished.php?nr='+roomarea.r.value+'&lr='+roomarea.depth.value+' '+roomarea.unit.value+'&wr='+roomarea.width.value+' '+roomarea.unit.value+'&hr='+roomarea.heat.value+' kW&w='+roomarea.w.value+'&ar='+h+'&ss='+roomarea.s1.value+'&ip='+roomarea.ip.value+'&psq='+roomarea.psq.value
}
else
{
	alert('Please input room name, width of room, length of room, price per sheet and installation price for the room in order to proceed.')
}
}
</script>
</head>
<body bgcolor="white" style="color:gray;display:block;margin-left:auto;margin-right:auto;">
<img src="Logo.png" height=100 width=200 style="display:block;margin:0 auto"><br>
<form name="roomarea" method="post" action="Finished.php">
<table align=center cellpadding=10>
<?php
echo "<tr><td align=right>Name<td>".$_SESSION['n'];
echo "<tr><td align=right>House number/name<td>".$_SESSION['h'];
echo "<tr><td align=right>Post code<td>".$_SESSION['po'];
echo "<tr><td align=right>Phone number<td>".$_SESSION['ph'];
?>
<tr>
<td align=right><font color=red>*</font>Room name<td align=left><input type="text" name="r">
<tr>
<td align=right>
<font color=red>*</font>Width of Room<td align=left><input name="width" size="6" value="0.00" style="font-size= 14pt" onkeyup="area();" /><tr>
<td align=right><font color=red>*</font>Length of Room
								<td align=left><input name="depth" size="6" value="0.00" style="font-size= 14pt" onkeyup="area();" />
								<tr>
								<td align=right style="vertical-align:top;"><font color=red>*</font>Select Unit of Measure
								<td colspan=2 align=left>
								<input type="radio" name="unit" value="metres" onclick="area();" />Metres<br><br>
								<input type="radio" name="unit" value="yards" onclick="area();" />Yards<br><br>
								<input type="radio" name="unit" value="feet" onclick="area();" />Feet<br><br>
								<input type="radio" name="unit" value="inches" onclick="area();" />Inches<br><br>
								<input type="radio" name="unit" value="centimetres" onclick="area();" />Centimetres
								<tr>
								<td align=right>Type of House
								<td align=left>
								<select name="s1" onchange="area()">
									<option>Passive House
									<option>Less than 5 years old
									<option>Well insulated, loft, wall, and double glazing
									<option>Some insulation
									<option>Low insulation
									<option>No insulation
								</select>
								<tr><td style="vertical-align:top" align=right>
								Heating to be put onto
								<td align=left>
								<input type="radio" name="w" value="Floor" checked>Floor<br><br>
								<input type="radio" name="w" value="Wall">Wall<br><br>
								<input type="radio" name="w" value="Ceiling">Ceiling<br><br>
								<input type="radio" name="w" value="Under Tiles">Under Tiles
								<tr><td align=right><font color=red>*</font>Price per sheet<td align=left><span style="padding-right:10;padding-left:10;padding-bottom:2;background-color:gray;border:1px solid black;color:black;">&pound;</span><input type="number" name="psq">
<tr><td align=right><font color=red>*</font>Installation price<td align=left><span style="padding-right:10;padding-left:10;padding-bottom:2;background-color:gray;border:1px solid black;color:black;">&pound;</span><input type="number" name="ip">
<tr>
<td align=right style="vertical-align:top;">Area of Room
<td>							<input readonly name="result" size="20" style="font-size= 12pt" /> <input readonly name="measure" size="22" style="font-size= 12pt"/></b><br>
							<input readonly name="resulta" size="20" style="font-size= 12pt" /> <input readonly name="measurea" size="22" style="font-size= 12pt"/></b><br>
							<input readonly name="resultb" size="20" style="font-size= 12pt" /> <input readonly name="measureb" size="22" style="font-size= 12pt"/></b><br>
							<input readonly name="resultc" size="20" style="font-size= 12pt" /> <input readonly name="measurec" size="22" style="font-size= 12pt"/></b><br>
							<input readonly name="resultd" size="20" style="font-size= 12pt" /> <input readonly name="measured" size="22" style="font-size= 12pt"/></b><br>
							<input readonly name="resulte" size="20" style="font-size= 12pt" /> <input readonly name="measuree" size="22" style="font-size= 12pt"/></b>
							<tr><td align=right>
							Heat Loss<td>
							<input readonly name="heat" size="20" style="font-size= 12pt" />&nbsp;kW
					<tr>
					<td colspan=2 align=center>
					<INPUT TYPE="RESET" NAME="Reset" VALUE="RESET" style="font-size= 12pt;color:white;background-color:gray;border:0px solid white;padding:10px;" onClick="area();" />
					<input type="button" value="ADD ANOTHER ROOM" style="color:white;background-color:gray;border:0px solid white;padding:10px;" onclick="add()">
					<input type="button" value="FINISHED" style="color:white;background-color:gray;border:0px solid white;padding:10px;" onclick="f()">
					</table>
</form>
<div style="align:center;vertical-align:bottom;padding:5;">
Important: The values of Annual Energy and related results are approximate which are based on mathematical calculations. If the actual energy values and savings differ Bright New Energy World will not be in any way responsible.The difference is due to a variety of conditions including but not limited to correct interpretation of insulation in all areas.
</div>
</body>
</html>