<?php
require_once('../Config/auth.php');
require_once('../Config/config.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us">
<head>
	<title>Home</title>
	<link rel="stylesheet" href="../Css/jq.css" type="text/css" media="print, projection, screen" />
	<link rel="stylesheet" href="../Css/style.css" type="text/css" media="print, projection, screen" />
	<link rel="stylesheet" type="text/css" href="../Css/2c-hd-ft-fixed-layout.css" />
	<link href="../Css/loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="outer">
<div id="hdr" align="center">
</div>
<div id="bar">
<span style="padding:3px;font-size:11px;"><script type='text/javascript' src='../JS/Menu.js'></script></span>
</div>
<div id="cont1">
<?php
require_once "../Config/auth.php";

?>
<div id="main">
<form enctype='multipart/form-data' action='password-exec.php' method='post' onsubmit='return validateform();'>
<table border="1" cellspacing="1" style="border-collapse: collapse" bordercolor="#000066" width="95%" cellpadding="5">
<tr>
<td  width="189" >
<font face="Verdana" size="2">New Password</td>
<td  width="469" >
<font face="Verdana"><input type=password name='password' id="password"></td></tr>
<tr>
<td  width="189" >
<font face="Verdana" size="2">Confirm Password</td>
<td  width="469" >
<font face="Verdana"><input type=password name='cpassword' id="cpassword"></td></tr>
<tr><td colspan="3"  height="25" width="737" ><p align="center"><font face="Verdana" size="2">
<input type=submit value='Submit'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=reset value='Reset Form'></font></td></tr>
</table></form>

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
