<?php
require_once('../Config/auth.php');
?>
<HTML>
<HEAD>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Prepaid Roaming Request</title>
<link href="../Css/loginmodule.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function validateform()
{
var customer_name = document.getElementById("Customer_Name");
var address = document.getElementById("Address");
var new_sim = document.getElementById("sim_number");
var lost_sim = document.getElementById("lostsim_number");
var ref_num1 = document.getElementById("reference_number1");
var ref_num2 = document.getElementById("reference_number2");
var ref_num3 = document.getElementById("reference_number3");
var legalNum = /\d+/;

if (customer_name.value == ""){
alert("Please type the name of the customer! \n")
  customer_name.focus();
  customer_name.select();
  return false;
  }
if (address.value == ""){
alert("Please address of customer! \n")
  address.focus();
  address.select();
  return false;
  }
        
if (new_sim.value == "" || new_sim.value.length < 7){
alert("Please type the new sim number \n or confirm that the digits are seven!");
  new_sim.focus();
  new_sim.select();
  return false;
  }
if (!(legalNum.test(new_sim.value)))
  {
      alert("You have type letters \n Please type figures");
      new_sim.focus();
      new_sim.select();
  return false;
  }
                  
if (lost_sim.value == "" || lost_sim.value.length < 7){
alert("Please type the lost sim number \n or confirm that the digits are seven!");
  lost_sim.focus();
  lost_sim.select();
  return false;
  }
if (!(legalNum.test(lost_sim.value))){ 
 alert("You have type letters \n Please type figures");   
  lost_sim.focus(); 
  lost_sim.select();    
  return false;         
  }  
if (ref_num1.value == "" || ref_num1.value.length < 7){
alert("Please type the reference number1 \n or confirm that the digits are seven!");
  ref_num1.focus();
  ref_num1.select();
  return false;
  }
 if (!(legalNum.test(ref_num1.value))){
  alert("You have type letters \n Please type figures");
   ref_num1.focus(); 
   ref_num1.select();
   return false;     
  } 
if (ref_num2.value == "" || ref_num2.value.length < 7){
 alert("Please type the reference number2 \n or confirm that the digits are seven!")
   ref_num2.focus();
   ref_num2.select();
   return false;
  }
  if (!(legalNum.test(ref_num2.value))){
   alert("You have type letters \n Please type figures");
    ref_num2.focus(); 
    ref_num2.select();
    return false;     
  } 
if (ref_num3.value == "" || ref_num3.value.length < 7){
    alert("Please type the reference number3 \n or confirm that the digits are seven!")
    ref_num3.focus();
    ref_num3.select();
    return false;
    }
if (!(legalNum.test(ref_num3.value))){
  alert("You have type letters \n Please type figures");
    ref_num3.focus(); 
    ref_num3.select();
    return false;     
    }                                      
}                                                                     
</script>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css"href="../Css/2c-hd-ft-fixed-layout.css" />
</HEAD>
<body>
<div id="outer">
<div id="hdr" align="center">
</div>
<div id="bar">
<span style="padding:3px;font-size:11px;"><script type='text/javascript' src='../JS/Menu.js'></script></span>
</div>
<div id="cont1">
<br/>
<br/>
<form enctype='multipart/form-data' action='process-roaming.php' method='post' onsubmit='return validateform();'>
<table  border = '1' width = "850px" cellspacing="1" style="border-collapse: collapse" cellpadding="5" align="center">
<tr>
<td colspan="3"><center><b>Prepaid Roaming Request Form</b></center></td>
</tr>
<tr>
<td width ="10%"><img src = "../images/bc_new.gif" alt= "image"/></td>
<td width ="25%"> <font face="Verdana" size="2">Customer Name</td>
<td width ="65%"><input type=text name='Customername' id='Customername'></td>
</tr>
<tr>
<td width ="10%"><img src = "../images/bc_new.gif" alt= "image"/></td>
<td width ="25%"> <font face="Verdana" size="2">Address</td>
<td width ="65%"><input type=text name='Address' id='Address'></td>
</tr>
<tr>
<td width ="10%"><img src = "../images/bc_new.gif" alt= "image"/></td>
<td width ="25%"> <font face="Verdana" size="2">NIN</td>
<td width ="65%"><input type=text name='NIN' id='NIN'></td>
</tr>
<tr>
<td width ="10%"><img src = "../images/bc_new.gif" alt= "image"/></td>
<td width ="25%"><font face="Verdana" size="2">Mobile Number</td>
<td width ="65%"><input type=text name='Mob_Number' id='Mob_Number'></td>
</tr>
<tr>
<td width ="10%"><img src = "../images/bc_new.gif" alt= "image"/></td>
<td width ="25%"><font face="Verdana" size="2">IMSI</td>
<td width ="65%"><input type=text name='IMSI_Number' id='IMSI_Number'></td>
</tr>
<tr>
<tr><td colspan="3">
<p align="center"><input type=submit value='Submit'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type=reset value='Reset Form'></td></tr>
</table>
</form>
</div>
<div id="ftr" align="center">
<center><font size=1 color="#000000" face="Arial">Qcell Number Change Database  - Second Edition<br>Powered by 
<b><a href="http://www.qcell.gm">QCell Ltd.</a></b>
<br>The Gambia's Only 3G Operator<br></font> </center></div>
</div>
</body>
</html>
