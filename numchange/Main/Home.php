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
	<link rel="stylesheet" type="text/css"href="../Css/2c-hd-ft-fixed-layout.css" />
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

$permission = $_SESSION['SESS_LEVEL_PERM'];
if($permission == "Administrator"){
echo('
<ul>
 <li><a href="../Main/register-form.php" STYLE="text-decoration:
none"><input type="button" value="Add User"></a></li>
 <li><a href="../Main/members-table.php" STYLE="text-decoration:
none"><input type="button" value="Edit User"></a></li>
</ul>
');
}
?>
<div id="main">
		<a href ="http://www.qmail.gm"><img src="../images/e-mail_icon.jpg" alt="Mail" width="350" height="350"/></a>
		<a href ="http://cug.qcell.gm"><img src="../images/closed_user_group_.jpg" alt="C.U.G" width="350" height="350"/></a>
		<a href ="http://helpdesk.qcell.gm"><img src="../images/Logo_Help_desc_port.jpg" alt="Helpdesk" width="350" height="350"/></a>
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
