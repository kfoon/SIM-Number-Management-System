
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
$user = $_SESSION['SESS_FIRST_NAME'];

 if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
  echo '<ul class="err">';
  foreach($_SESSION['ERRMSG_ARR'] as $msg) {
  echo '<li>',$msg,'</li>';
  }
  echo '</ul>';
  unset($_SESSION['ERRMSG_ARR']);
  }

?>
<form enctype='multipart/form-data' name='loginForm' action='register-exec.php' method='post'>
<table border="1" cellspacing="1" style="border-collapse: collapse" bordercolor="#000066" width="95%" cellpadding="5">
<tr><td height="30" width="55" >
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">First Name</td>
<td  width="469" >
<font face="Verdana"><input type=text name='fname'></td></tr><tr><td  width="55" >
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Last Name</td>
<td width="469" >
<font face="Verdana"><input type=text name='lname'></td></tr><tr><td  width="55" >
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Username</td>
<td  width="469" >
<font face="Verdana"><input type=text name='login'></td></tr><tr><td >
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Password</td>
<td  width="469" >
<font face="Verdana"><input type=password name='password'></td></tr><tr><td >
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td height="30" width="189">
<font face="Verdana" size="2">Confirm Password</td>
<td width="469" >
<font face="Verdana"><input type=password name='cpassword'></td></tr><tr><td  width="55" >
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td  width="189" >
<font face="Verdana" size="2">Department</td>
<td  width="469" >
<font face="Verdana"><select name='Department'>
<option value='Administrator'>Administrator
<option value='Operator'>Operator
<option value='IN Tech'>IN Tech
<option value='Switch Tech'>Switch Tech
<option value='customercare'>Customer Care
</select></td></tr>
<tr><td colspan="3" bgcolor="#B5CBEF" height="25" width="737" background="tile_sub.gif">
<p align="center"><font face="Verdana" size="2"><input type=submit value='Add User'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type=reset value='Reset Form'></font></td></tr>
	    </div>
</div>

        <div id="footer">
        </div>       
    </div>
</body>
</html>
