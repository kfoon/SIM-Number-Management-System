
<div id="cont">

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional-dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="../login/Js/prototype.js"></script>
<script type="text/javascript" src="../login/Js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="../login/Js/lightbox.js"></script>
<link href="../Css/style.css" rel="stylesheet" type="text/css" />

<style type="text/css">
body{
	font: 12px Arial, Helvetica, sans-serif;
	color: #303030;
	line-height: 18px;
	width:98%;
	background: url(../images/343.jpg);


#container {
	margin: 0px auto;
	padding: 0px;
	width: 100%; /* width of the layout -- can be set to any value including percentages */
 	
	}
	h1
{
	display:block;
	padding:2px;
	background:url(../login/Images/bar.gif);
}
	
#header{
	padding : 0px;
	margin: 0px;
	width: 100%;
	overflow: hidden;
}

#navigation
{
	margin: 0px;
	padding: 0px;
	width: 100%;
}

#sidebar-right {
	float: right;
	width: 220px; /* width of the right sidebar -- can be set to any value including percentages */Help_desc.jpg
	margin: 0px;
	padding: 0px;
	overflow: hidden;
}

#sidebar-left {
	float: left;
	width: 611px; /* witdh of the left sidebar -- can be set to any value including percentages */
	margin: 0px;
	padding: 0px;

}

#content {
	margin: 0px;
	padding: 0px;
	height: 1%; /* IE6 hack... it's very minor, though */

#content-inner 
{
	width:px;
	
}
	
#footer{
	clear: both;
	margin: 0px;
	padding: 0px;
	width: 100%;


}
</style>
<title>Home</title>
</head>
<body >

    <div id="container">
        <div id="header">
		<img src="../images/Banner.jpg" alt="Qcell Black Logo" width="1222" height ="140"></img>
        </div>
        <div id="navigation"> 
  	<span style="padding:3px;font-size:11px;"><script type='text/javascript' src='../JS/Menu.js'></script></span>
        </div>
        <br/>
        <div id="sidebar-left">
        </div>
    	<div  id="content">
<div id="content-inner">
<?php 
require_once "../Config/auth.php";

$permission = $_SESSION['SESS_LEVEL_PERM'];

?>
<form enctype='multipart/form-data' action='delete-users.php' method='post'>
<table border="1" cellspacing="1" style="border-collapse: collapse" bordercolor="#000066" width="95%" cellpadding="5">
<tr>
<th width="20%"><font face="Verdana" size="2">First Name</th>
<th width="20%"><font face="Verdana" size="2">Last Name</th>
<th width="20%"><font face="Verdana" size="2">Username</th>
<th width="20%"><font face="Verdana" size="2">Level</th>
<th width="20%"><font face="Verdana" size="2">Edit User</th>
</tr>
<tr>
<?php
$cug_id = $_POST['CUGid'];
include ("../Config/db.inc.php");
$cugquery = "SELECT * FROM members";
$queryresult = mysql_query($cugquery);

 $i = 0;
 while($data = mysql_fetch_array($queryresult)){
   echo("<tr><td> <input type = 'checkbox' name = 'checkbox[]' value = '$data[member_id]' />
   <font face='Verdana' size='2'>$data[firstname]</td>
   <td><font face='Verdana' size='2'>$data[lastname]</td>
   <td><font face='Verdana' size='2'>$data[login]</td>
   <td><font face='Verdana' size='2'>$data[permission]</td>
   <td><center><a href=\"edit-user.php?id=$data[member_id] \"> Click to Edit User </a></center></td>
   </tr>");
     }
     $i++;
     ?>
    </tr> 
<tr><td colspan="5" bgcolor="#B5CBEF" height="25" width="737" background="tile_sub.gif"><p align="center"><font face="Verdana" size="2">
<input type=submit name="delete" value='Delete Users'>
</font></td></tr>
	    </div>
</div>

        <div id="footer">
        </div>       
    </div>
</body>
</html>
