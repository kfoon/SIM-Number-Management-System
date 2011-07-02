<?php
require_once('../Config/auth.php');
?>
<HTML>
<HEAD>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Qcell Number Purchased Form</title>
<link href="../Css/loginmodule.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../calendar_eu.js"></script>
<link rel="stylesheet" href="../calendar.css">

<script type="text/javascript">
function validateform()
{
var form = document.getElementById("form");
var name = document.getElementById("CustomerName");
var address = document.getElementById("Address");
var exist = document.getElementById("ExistingNumber");
var request = document.getElementById("RequstedNumber");
var receipt_no = document.getElementById("receipt_no");

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
    if (!(legalNum.test(receipt_no.value))) {
  alert("Error with the receipt Number you entered \n");
  receipt_no.focus();
  receipt_no.select();
  return false;
  }       
}                                                                                  
</script>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../Css/2c-hd-ft-fixed-layout.css" />
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
<form enctype='multipart/form-data' name="purchase" action='process-purchase.php' method='post' onsubmit='return validateform();'>

<table border="1" cellspacing="1" style="border-collapse: collapse" bordercolor="#000066" width="850px" width="552px"cellpadding="5" align="center">
<tr>
<td colspan="3"><center><b>Number Registration Form</b></center></td>
</tr>
<tr>
<td width ="9%"><img src = "../images/bc_new.gif" alt= "image"/></td>
<td width ="30%"><font face="Verdana" size="2">Customer Name</td>
<td><input type=text name='CustomerName' id="CustomerName"></td>
</tr>
<tr>
<td width ="9%"><img src = "../images/bc_new.gif" alt= "image"/></td>
<td width ="30%"><font face="Verdana" size="2">Address</td>
<td><input type=text name='Address' id="Address"></td></td>
</tr>
<tr>
<td width ="9%"><img src = "../images/bc_new.gif" alt= "image"/></td>
<td width="30%"><font face="Verdana" size="2">NIN</td>
<td><input type=text name='NIN' id="NIN"></td>
</tr>
<tr>
<td width ="9%"><img src = "../images/bc_new.gif" alt= "image"/></td>
<td width="30%"><font face="Verdana" size="2">Mobile Number</td>
<td><input type=text name='RequstedNumber' id="RequstedNumber" maxlength="7"></td>
</tr>
<!-- Row starts here -->
<tr><td width ="9%">
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Receipt No.</td>  
<td  width="469" >
<font face="Verdana"><input type=text name='receipt_no' id="receipt_no" ></td></tr>  <!-- A row end -->

<!-- Row starts here -->
<tr><td width ="9%">
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Sales Channel</td>
<td  width="469" >
<font face="Verdana">
<select name='Sales_Channel'>
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
<!-- A row end -->

<!-- Row starts here -->
<tr><td width ="9%">
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Nationality</td>
<td  width="469" >
<font face="Verdana">
<select name='nationality'>
<option value="Gambian">Gambian</option>
  <option value="Afghan">Afghan</option>

  <option value="Albanian">Albanian</option>
  <option value="Algerian">Algerian</option>
  <option value="American">American</option>
  <option value="Andorran">Andorran</option>
  <option value="Angolan">Angolan</option>
  <option value="Antiguans">Antiguans</option>

  <option value="Argentinean">Argentinean</option>
  <option value="Armenian">Armenian</option>
  <option value="Australian">Australian</option>
  <option value="Austrian">Austrian</option>
  <option value="Azerbaijani">Azerbaijani</option>
  <option value="Bahamian">Bahamian</option>

  <option value="Bahraini">Bahraini</option>
  <option value="Bangladeshi">Bangladeshi</option>
  <option value="Barbadian">Barbadian</option>
  <option value="Barbudans">Barbudans</option>
  <option value="Batswana">Batswana</option>
  <option value="Belarusian">Belarusian</option>

  <option value="Belgian">Belgian</option>
  <option value="Belizean">Belizean</option>
  <option value="Beninese">Beninese</option>
  <option value="Bhutanese">Bhutanese</option>
  <option value="Bolivian">Bolivian</option>
  <option value="Bosnian">Bosnian</option>

  <option value="Brazilian">Brazilian</option>
  <option value="British">British</option>
  <option value="Bruneian">Bruneian</option>
  <option value="Bulgarian">Bulgarian</option>
  <option value="Burkinabe">Burkinabe</option>
  <option value="Burmese">Burmese</option>

  <option value="Burundian">Burundian</option>
  <option value="Cambodian">Cambodian</option>
  <option value="Cameroonian">Cameroonian</option>
  <option value="Canadian">Canadian</option>
  <option value="Cape verdean">Cape Verdean</option>
  <option value="Central african">Central African</option>

  <option value="Chadian">Chadian</option>
  <option value="Chilean">Chilean</option>
  <option value="Chinese">Chinese</option>
  <option value="Colombian">Colombian</option>
  <option value="Comoran">Comoran</option>
  <option value="Congolese">Congolese</option>

  <option value="Costa rican">Costa Rican</option>
  <option value="Croatian">Croatian</option>
  <option value="Cuban">Cuban</option>
  <option value="Cypriot">Cypriot</option>
  <option value="Czech">Czech</option>
  <option value="Danish">Danish</option>

  <option value="Djibouti">Djibouti</option>
  <option value="Dominican">Dominican</option>
  <option value="Dutch">Dutch</option>
  <option value="East timorese">East Timorese</option>
  <option value="Ecuadorean">Ecuadorean</option>
  <option value="Egyptian">Egyptian</option>

  <option value="Emirian">Emirian</option>
  <option value="Equatorial guinean">Equatorial Guinean</option>
  <option value="Eritrean">Eritrean</option>
  <option value="Estonian">Estonian</option>
  <option value="Ethiopian">Ethiopian</option>
  <option value="Fijian">Fijian</option>

  <option value="Filipino">Filipino</option>
  <option value="Finnish">Finnish</option>
  <option value="French">French</option>
  <option value="Gabonese">Gabonese</option>
  <option value="Gambian">Gambian</option>
  <option value="Georgian">Georgian</option>

  <option value="German">German</option>
  <option value="Ghanaian">Ghanaian</option>
  <option value="Greek">Greek</option>
  <option value="Grenadian">Grenadian</option>
  <option value="Guatemalan">Guatemalan</option>
  <option value="Guinea-Bissauan">Guinea-Bissauan</option>

  <option value="Guinean">Guinean</option>
  <option value="Guyanese">Guyanese</option>
  <option value="Haitian">Haitian</option>
  <option value="Herzegovinian">Herzegovinian</option>
  <option value="Honduran">Honduran</option>
  <option value="Hungarian">Hungarian</option>

  <option value="Icelander">Icelander</option>
  <option value="Indian">Indian</option>
  <option value="Indonesian">Indonesian</option>
  <option value="Iranian">Iranian</option>
  <option value="Iraqi">Iraqi</option>
  <option value="Irish">Irish</option>

  <option value="Israeli">Israeli</option>
  <option value="Italian">Italian</option>
  <option value="Ivorian">Ivorian</option>
  <option value="Jamaican">Jamaican</option>
  <option value="Japanese">Japanese</option>
  <option value="Jordanian">Jordanian</option>

  <option value="Kazakhstani">Kazakhstani</option>
  <option value="Kenyan">Kenyan</option>
  <option value="Kittian and Nevisian">Kittian and Nevisian</option>
  <option value="Kuwaiti">Kuwaiti</option>
  <option value="Kyrgyz">Kyrgyz</option>
  <option value="Laotian">Laotian</option>

  <option value="Latvian">Latvian</option>
  <option value="Lebanese">Lebanese</option>
  <option value="Liberian">Liberian</option>
  <option value="Libyan">Libyan</option>
  <option value="Liechtensteiner">Liechtensteiner</option>
  <option value="Lithuanian">Lithuanian</option>

  <option value="Luxembourger">Luxembourger</option>
  <option value="Macedonian">Macedonian</option>
  <option value="Malagasy">Malagasy</option>
  <option value="Malawian">Malawian</option>
  <option value="Malaysian">Malaysian</option>
  <option value="Maldivan">Maldivan</option>

  <option value="Malian">Malian</option>
  <option value="Maltese">Maltese</option>
  <option value="Marshallese">Marshallese</option>
  <option value="Mauritanian">Mauritanian</option>
  <option value="Mauritian">Mauritian</option>
  <option value="Mexican">Mexican</option>

  <option value="Micronesian">Micronesian</option>
  <option value="Moldovan">Moldovan</option>
  <option value="Monacan">Monacan</option>
  <option value="Mongolian">Mongolian</option>
  <option value="Moroccan">Moroccan</option>
  <option value="Mosotho">Mosotho</option>

  <option value="Motswana">Motswana</option>
  <option value="Mozambican">Mozambican</option>
  <option value="Namibian">Namibian</option>
  <option value="Nauruan">Nauruan</option>
  <option value="Nepalese">Nepalese</option>
  <option value="New Zealander">New Zealander</option>

  <option value="Ni-Vanuatu">Ni-Vanuatu</option>
  <option value="Nicaraguan">Nicaraguan</option>
  <option value="Nigerien">Nigerien</option>
  <option value="North Korean">North Korean</option>
  <option value="Northern Irish">Northern Irish</option>
  <option value="Norwegian">Norwegian</option>

  <option value="Omani">Omani</option>
  <option value="Pakistani">Pakistani</option>
  <option value="Palauan">Palauan</option>
  <option value="Panamanian">Panamanian</option>
  <option value="Papua New Guinean">Papua New Guinean</option>
  <option value="Paraguayan">Paraguayan</option>

  <option value="Peruvian">Peruvian</option>
  <option value="Polish">Polish</option>
  <option value="Portuguese">Portuguese</option>
  <option value="Qatari">Qatari</option>
  <option value="Romanian">Romanian</option>
  <option value="Russian">Russian</option>

  <option value="Rwandan">Rwandan</option>
  <option value="Saint Lucian">Saint Lucian</option>
  <option value="Salvadoran">Salvadoran</option>
  <option value="Samoan">Samoan</option>
  <option value="San Marinese">San Marinese</option>
  <option value="Sao Tomean">Sao Tomean</option>

  <option value="Saudi">Saudi</option>
  <option value="Scottish">Scottish</option>
  <option value="Senegalese">Senegalese</option>
  <option value="Serbian">Serbian</option>
  <option value="Seychellois">Seychellois</option>
  <option value="Sierra Leonean">Sierra Leonean</option>

  <option value="Singaporean">Singaporean</option>
  <option value="Slovakian">Slovakian</option>
  <option value="Slovenian">Slovenian</option>
  <option value="Solomon Islander">Solomon Islander</option>
  <option value="Somali">Somali</option>
  <option value="South African">South African</option>

  <option value="South Korean">South Korean</option>
  <option value="Spanish">Spanish</option>
  <option value="Sri Lankan">Sri Lankan</option>
  <option value="Sudanese">Sudanese</option>
  <option value="Surinamer">Surinamer</option>
  <option value="Swazi">Swazi</option>

  <option value="Swedish">Swedish</option>
  <option value="Swiss">Swiss</option>
  <option value="Syrian">Syrian</option>
  <option value="Taiwanese">Taiwanese</option>
  <option value="Tajik">Tajik</option>
  <option value="Tanzanian">Tanzanian</option>

  <option value="Thai">Thai</option>
  <option value="Togolese">Togolese</option>
  <option value="Tongan">Tongan</option>
  <option value="Trinidadian or Tobagonian">Trinidadian or Tobagonian</option>
  <option value="Tunisian">Tunisian</option>
  <option value="Turkish">Turkish</option>

  <option value="Tuvaluan">Tuvaluan</option>
  <option value="Ugandan">Ugandan</option>
  <option value="Ukrainian">Ukrainian</option>
  <option value="Uruguayan">Uruguayan</option>
  <option value="Uzbekistani">Uzbekistani</option>
  <option value="Venezuelan">Venezuelan</option>

  <option value="Vietnamese">Vietnamese</option>
  <option value="Welsh">Welsh</option>
  <option value="Yemenite">Yemenite</option>
  <option value="zambian">Zambian</option>
  <option value="Zimbabwean">Zimbabwean</option>

</select>
</td></tr>
<!-- A row end -->

<!-- Row starts here -->
<tr><td width ="9%">
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Date of Birth</td>  
<td  width="469" >
<font face="Verdana"><input type=text name='DOB' id="DOB" >
<script language="JavaScript">
        new tcal ({
                // form name
                'formname': 'purchase',
                // input name
                'controlname': 'DOB'
        });

        </script>
</td></tr>  
<!-- A row end -->

<!-- Row starts here -->
<tr><td width ="9%">
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Registration Medium</td>
<td  width="469" >
<font face="Verdana">
<select name='Registration_Medium'>
<option value="Walk-in">Walk-in
<option value="Phone">Phone
<option value="SMS">SMS
<option value="Third-party">Third-party
</select>
</td></tr>
<!-- A row end -->

<tr>
<td colspan="3">
<input type="hidden" name="Location" value="Not Set">
<p align="center"><input type=submit value='Submit'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type=reset value='Reset Form'></font></td></tr>
</table>
<br/>
</div>
<div id="ftr" align="center">
<center><font size=1 color="#000000" face="Arial">Qcell Number Change Database  - Second Edition<br>Powered by 
<b><a href="http://www.qcell.gm">QCell Ltd.</a></b>
<br>The Gambia's Only 3G Operator<br></font> </center></div>
</div>

</body>
</html>
