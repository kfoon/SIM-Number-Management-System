<?php
/*
session_start();
require_once('../login/auth.php');
$user = $_SESSION['SESS_FIRST_NAME'];
*/
 ?>
 <?php
 /* if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
 echo '<ul class="err">';
 foreach($_SESSION['ERRMSG_ARR'] as $msg) {
  echo '<li>',$msg,'</li>';
  }
  echo '</ul>';
  unset($_SESSION['ERRMSG_ARR']);
  }
*/
?>
<link href="../loginmodule.css" rel="stylesheet" type="text/css" />
<form enctype='multipart/form-data' name='loginForm' action='login/register-exec.php' method='post'>
<table border="1" cellspacing="1" style="border-collapse: collapse" bordercolor="#000066" width="95%" cellpadding="5">
<tr>
<td colspan="3" bgcolor="#B5CBEF" height="17" width="100%" bordercolor="#FFFFFF" background="../images/tile_back.gif">
<p align="left\><b><font face="Verdana" size="2" color="#FFFFFF"><img border="0" src="../images/nav_m.gif" width="8" height="8">
<font face='Verdana' size=2 color='#FFFFFF'><b>
<a href=" ../login/member-profile.php">My Profile</a> | <a href=" ../login/logout.php">Logout</a> |
<a href=" ../login/member-index.php">New Request</a>  |  
<a href=" ../main/in_request.php">IN Request Table</a>  |
<a href=" ../main/changed.php">Changed Report</a>


<!- You can add a form title here -->
<title>Qcell Number Change - Add New User</title>
&nbsp;
</font><font face="Verdana" size="2" color="#000066"> </font></b></td>
</tr><tr><td colspan="3" bgcolor="#B5CBEF" height="16" width="100%" bordercolor="#FFFFFF" background="tile_sub.gif"><font size="2" face="Verdana"><b><font face="Verdana" size="2" color="#000066">
<!- You can add a brief form description here-->
<img alt="logo" src="../images/QCELL.jpg"  width="150" height="75"/>
&nbsp;
</font></b></font></td></tr><tr><td colspan="3" bgcolor="#D6DFEF" height="16" width="100%" bordercolor="#FFFFFF"><font size="1" face="Verdana">Please fill in all fields *</font></td></tr><tr><td height="30" width="55" bgcolor="#EFF3F7" bordercolor="#FFFFFF">
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
<img border="0" src="../images/bc_new.gif" width="28" height="28"></td><td height="30" width="189" bgcolor="#EFF3F7" bordercolor="#FFFFFF">
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
<td colspan="3" bgcolor="#B5CBEF" height="17" width="100%" bordercolor="#FFFFFF" background="../images/tile_back.gif">
<font face='Verdana' size=2 color='#FFFFFF'><b>
<center> | <a href="../login/logout.php">Logout</a> |
<a href="../login/home.php">Home</a>  |      
</center></td>
</table></form>
<br><center><font size=1 color="#000000" face="Arial">Qcell CUG Database  - FIRST Edition<br>Powered by
<b><a href="http://www.qcell.gm">Qcell Ltd.</a></b>
<br>The Gambia's Only 3G Operator<br></font> </center>
 
  
