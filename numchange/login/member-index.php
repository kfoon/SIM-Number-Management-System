<?php
//require_once('../Config/auth.php');
?>
<HTML>
<HEAD>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Qcell Number Request</title>
<link href="../loginmodule.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function validateform()
{
var form = document.getElementById("form");
var name = document.getElementById("CustomerName");
var address = document.getElementById("Address");
var exist = document.getElementById("ExistingNumber");
var request = document.getElementById("RequstedNumber");

// variable for allowed digits
var legalNum = /\d+/;

if (name.value == ""){
  alert("Enter the name of customer! \n");
  name.focus(); 
  name.select();
  return false;
  }
if (address.value == ""){
  alert("Enter the existing number! \n");
  address.focus(); 
  address.select();
  return false;
  }                  
if (exist.value == ""){
  alert("Enter the existing number! \n");
  exist.focus();
  exist.select();
  return false;  
  }
if (exist.value.length < 7 ){
  alert("Then Number length you entered is incorrect! \n");
  exist.focus();
  exist.select();
  return false;  
  }
if (!(legalNum.test(exist.value)))
  {
  alert("Error with the existing Number you entered!! \n");
  exist.focus();
  exist.select();
  return false;  
  }
if (request.value == ""){
  alert("Enter the requested number! \n");
  request.focus();
  request.select();
  return false;
;
  }
if (request.value.length < 7 ){
  alert("Then Number length you entered is incorrect! \n");
  request.focus();
  request.select();
  return false;
  }
if (!(legalNum.test(request.value))) {
  alert("Error with the requested Number you entered \n");
  request.focus();
  request.select();
  return false;
  }            
}                                                                                  
</script>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
</HEAD>
          
<form enctype='multipart/form-data' action='../Main/process-request.php' method='post' onsubmit='return validateform();'>
<table border="1" if (customer_name.value == ""){
alert("Please type the name of the customer! \n")
  customer_name.focus();
    customer_name.select();
      return false;
        }
        cellspacing="1" style="border-collapse: collapse" bordercolor="#000066" width="95%" cellpadding="5">
<tr>
<td colspan="3" bgcolor="#B5CBEF" height="17" width="100%" bordercolor="#FFFFFF" background="../images/tile_back.gif">
<p align="left\><b><font face="Verdana" size="2" color="#FFFFFF"><img border="0" src="../images/nav_m.gif" width="8" height="8">
<font face='Verdana' size=2 color='#FFFFFF'><b>
Welcome
<!- You can add a form title here -->
<title>Qcell - Number change requested</title>
&nbsp;
</font><font face="Verdana" size="2" color="#000066"> </font></b></td>
</tr><tr><td colspan="3" bgcolor="#B5CBEF" height="16" width="100%" bordercolor="#FFFFFF" background="tile_sub.gif"><font size="2" face="Verdana"><b><font face="Verdana" size="2" color="#000066">
<!- You can add a brief form description here-->
<img alt="logo" src="../images/QCELL.jpg"  width="150" height="75"/>
&nbsp;
</font></b></font></td></tr><tr><td colspan="3" bgcolor="#D6DFEF" height="16" width="100%" bordercolor="#FFFFFF">
<font size="1" face="Verdana">Qcell Number Request</font></td></tr>

<!-- Row starts here -->
<tr><td height="30" width="55" bgcolor="#EFF3F7" bordercolor="#FFFFFF">
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td>
<td  width="189" ><font face="Verdana" size="2">Customer Name</td>
<td  width="469" ><font face="Verdana"><input type=text name='CustomerName' id="CustomerName"></td></tr>
<!-- A row end -->

<!-- Row starts here -->
<tr><td height="30" width="55" bgcolor="#EFF3F7" bordercolor="#FFFFFF">
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Address</td>
<td  width="469" >
<font face="Verdana"><input type=text name='Address' id="Address"></td></tr>
<!-- A row end -->

<!-- Row starts here -->
<tr><td height="30" width="55" bgcolor="#EFF3F7" bordercolor="#FFFFFF">
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">NIN</td>
<td  width="469" >
<font face="Verdana"><input type=text name='NIN' id="NIN"></td></tr>
<!-- A row end -->

<!-- Row starts here -->
<tr><td height="30" width="55" bgcolor="#EFF3F7" bordercolor="#FFFFFF">
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Existing Number</td>
<td  width="469" >
<font face="Verdana"></td></tr>
<!-- A row end -->

<!-- Row starts here -->
<tr><td height="30" width="55" bgcolor="#EFF3F7" bordercolor="#FFFFFF">
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Requsted Number</td>  
<td  width="469" >
<font face="Verdana"><input type=text name='RequstedNumber' id="RequstedNumber" maxlength="7"></td></tr>      
<!-- A row end -->

<!-- Row starts here -->
<tr><td height="30" width="55" bgcolor="#EFF3F7" bordercolor="#FFFFFF">
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Location</td>
<td  width="469" >
<font face="Verdana">
<select name='Location'>
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
<option value='Airport'>Airport
</select>
</td></tr>
<!-- A row end -->

<!--
<tr><td  width="55" >
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">CUG Rental</td>
<td  width="469" >
<font face="Verdana"><select name='CUGRental'>
<option value='GMD 75'>75
<option value='GMD 100'>100
<option value='GMD 125'>125
<option value='GMD 150'>150
<option value='GMD 175'>175
<option value='GMD 200'>200
<option value='GMD 225'>225
<option value='GMD 250'>250
<option value='GMD 275'>275
<option value='GMD 300'>300
<option value='GMD 325'>325
<option value='GMD 350'>350
<option value='GMD 375'>375
</select></td></tr>
-->
<tr><td colspan="3" bgcolor="#B5CBEF" height="25" width="737" background="tile_sub.gif">
<p align="center"><font face="Verdana" size="2"><input type=submit value='Submit'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type=reset value='Reset Form'></font></td></tr>
<td colspan="3" bgcolor="#B5CBEF" height="17" width="100%" bordercolor="#FFFFFF" background="../images/tile_back.gif">
<font face='Verdana' size=2 color='#FFFFFF'><b>
<center> | <a href="../login/logout.php">Logout</a> |
<a href="../login/home.php">Home</a>  |
</center></td>
</table></form>
<br><center><font size=1 color="#000000" face="Arial">Qcell Number Change Database  - FIRST Edition<br>Powered by 
<b><a href="http://www.qcell.gm">QCell Ltd.</a></b>
<br>The Gambia's Only 3G Operator<br></font> </center>

