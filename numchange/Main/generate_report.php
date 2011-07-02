<?php
require_once('../Config/auth.php');
require_once('../Config/config.php');
include "../Config/db.inc.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us">
<head>
	<title>Report Generator</title>
	<link rel="stylesheet" href="../Css/jq.css" type="text/css" media="print, projection, screen" />
	<link rel="stylesheet" href="../Css/style.css" type="text/css" media="print, projection, screen" />
	<link rel="stylesheet" type="text/css" href="../Css/2c-hd-ft-fixed-layout.css" />

<script type="text/javascript">
var table = document.getElementById("table");
function validateform(){
 var table = document.getElementById("table");
 var addr = document.getElementById("Address");
 if (table.value == ""){
   alert("You most select a table to query from!! \n");
   addr.focus();
   addr.select();
   return false;
  }

function disablefield()
{
  if (document.search.table.value == "numchange") {
  document.search.ExistingNo.disabled=false;
  document.search.RequestedNo.disabled=false;
  document.search.NewSim.disabled=true;
  document.search.LostSim.disabled=true;
  document.search.Location.disabled=false;
  }
  if (document.search.table.value == "replacement" ) {
  document.search.ExistingNo.disabled=true;
  document.search.RequestedNo.disabled=true;
  document.search.NewSim.disabled=false;          
  document.search.LostSim.disabled=false;   
  }                  
 }
} 
</script>
</head>
<body>
<div id="outer">
<div id="hdr" align="center">
</div>
<div id="bar">
<span style="padding:3px;font-size:11px;"><script type='text/javascript' src='../JS/Menu.js'></script></span>
</div>
<div id="cont1">
<div id="main">
<form enctype='multipart/form-data' action='search-result.php' method='post' name='search' id='search' onsubmit='return validateform();'>
<table border="1" cellspacing="1" style="border-collapse: collapse" bordercolor="#000066" width="95%" cellpadding="5">
	<tr><td  width="55">
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td width="189" >
<font face="Verdana" size="2">Select Table</td>
<td  width="469" >
<font face="Verdana"><select name='table' id='table' onChange='disablefield();'>
<option value=''>--Select--
<option value='register'>Registration Report
<option value='report'>Choose Num Report
<option value='sim_replacement_history'>Sim Replacement Report
<option value='roaming_report'>Roaming Report
</select>
</td></tr>
<tr>
<td width ="9%"><img src = "../images/bc_new.gif" alt= "image"/></td>
<td width ="30%"><font face="Verdana" size="2">Address</td>
<td><input type=text name='Address' id="Address"></td></td>
</tr>
<tr><td  width="55">
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td width="189" >
<font face="Verdana" size="2">Sales Channel</td>
<td  width="469" >
<font face="Verdana"><select name='Sales_Channel'>
<option value=''>--Select--
<option value="001 - Head Office">001 - Head Office
<option value="002 - Brikama Branch">002 - Brikama Branch
<option value="003 - Basse">003 - Basse
<option value="004 - IN-House">004 - IN-House
<option value="005 - Airport">005 - Airport
<option value="006 - Quantumnet">006 - Quantumnet
<option value="007 - Roadshow">007 - Roadshow
<option value="008 - Alpha Barry">008 - Alpha Barry
</select>
</td></tr>
<!-- Row starts here -->
<tr><td width ="9%">
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Registration Medium</td>
<td  width="469" >
<font face="Verdana">
<select name='Registration_Medium'>
<option value=''>--Select--
<option value="Walk-in">Walk-in
<option value="Phone">Phone
<option value="SMS">SMS
<option value="Third-party">Third-party
</select>
</td></tr>
<tr>
<td width ="9%"><img src = "../images/bc_new.gif" alt= "image"/></td>
<td width ="30%"><font face="Verdana" size="2">Nationality</td>
<td><input type=text name='Nationality' id="Nationality"></td></td>
</tr>
<!-- A row end -->
<tr><td  width="55" >
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Location</td>
<td  width="469" >
<font face="Verdana"><select name='Location' id='Location'>
<option value=''>--Select--
<option value='Aisha Marie Cafe'>Aisha Marie Cafe
<option value='Arch Cafe'>Arch Cafe 
<option value='Bakau Cafe'>Bakau Cafe
<option value='Banjul Cafe'>Banjul Cafe
<option value='Barra Cafe'>Barra Cafe  
<option value='Churchills Cafe'>Churchills Cafe
<option value='HeadOffice Cafe'>HeadOffice Cafe
<option value='Kotu Cafe'>Kotu Cafe
<option value='Lamin Cafe'>Lamin Cafe
<option value='Qcell HeadOffice'>Qcell HeadOffice
<option value='Senegambia Cafe'>Senegambia Cafe  
<option value='Westfield Cafe'>Westfield Cafe    
<option value='Brikama'>Brikama
<option value='Brikama Ba'>Brikama Ba
<option value='Farafenni'>Farafenni
<option value='Jarra Soma'>Jarra Soma
<option value='Basse 1'>Basse 1
<option value='Basse 2'>Basse 2
</select></td></tr>
<tr><td  width="55" >
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">User</td>
<td  width="469" >
<font face="Verdana">
<?php 
$cugquery = "SELECT count(*) AS num FROM  members";
$queryresult = mysql_query($cugquery);
$row = mysql_fetch_array($queryresult);


echo" <select name=\"member\" id=\"member\">  ";
$results= mysql_query("SELECT member_id, login, permission FROM members Order by login asc");
$id = "member_id";
$name = "login";
$permission = "permission";
echo mysql_error();

if (mysql_Numrows($results)>0)
{
$numrows=mysql_NumRows($results);
 echo "<option value=''>--Select--</option>";
$x=0; 
  while ($x<$numrows){   //loop through the records
  $theId=mysql_result($results,$x,$id);                 //place each record in the variable everytime we loop
  $theName=mysql_result($results,$x,$name);
  $theRental=mysql_result($results,$x,$permission);
  echo "<option value=\"$theName\">$theName</option>\n";  //and place it in the select
  $x++;
  }
  }
  echo "</select>";  //close the select
                                         
                                                           
    ?>    
</td></tr>
<tr><td  width="55" >
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Date</td>
<td  width="469" >
<font face="Verdana" size="2">From: <input type="text" name="from_date">
To: <input type="text" name="to_date">
</td></tr><tr><td colspan="3" ><p align="center"><font face="Verdana" size="2">
<input type=submit value='Search'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type=reset value='Reset Form'></font></td></tr></table></form>	


</div>
</div>
<div id="ftr" align="center">
<center><font size=1 color="#000000" face="Arial">Qcell Number Change Database  - Second Edition<br>Powered by 
<b><a href="http://www.qcell.gm">QCell Ltd.</a></b>
<br>The Gambia's Only 3G Operator<br></font> </center>
</div>
</div>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-2189649-2";
urchinTracker();
</script>
</body>
</html>
