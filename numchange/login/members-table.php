<?php

//require_once('../login/auth.php');
?>

<link href="../loginmodule.css" rel="stylesheet" type="text/css" />

<form enctype='multipart/form-data' action='delete-users.php' method='post'>
<table border="1" cellspacing="1" style="border-collapse: collapse" bordercolor="#000066" width="95%" cellpadding="5">
<tr>
<td colspan="5"  bgcolor="#B5CBEF" height="17" width="100%" bordercolor="#FFFFFF" background="../images/tile_back.gif">
<p align="left\><b><font face="Verdana" size="2" color="#FFFFFF"><img border="0" src="../images/nav_m.gif" width="8" height="8">
<font face='Verdana' size=2 color='#FFFFFF'><b>
<a href=" ../login/member-profile.php">My Profile</a> | <a href=" ../login/logout.php">Logout</a> |
<a href=" ../login/member-index.php">New Request</a>  |
<a href=" ../main/hlr_request.php">HLR Request Table</a>  |
<a href=" ../main/changed.php">Changed Report</a>

<!- You can add a form title here -->
<title> Qcell - Number Change Users </title>
&nbsp;
</font><font face="Verdana" size="2" color="#000066"> </font></b></td>
</tr><tr><td colspan="3" bgcolor="#B5CBEF" height="16" width="100%" bordercolor="#FFFFFF" background="tile_sub.gif"><font size="2" face="Verdana"><b><font face="Verdana" size="2" color="#000066">
<!- You can add a brief form description here-->
<img alt="logo" src="../images/QCELL.jpg"  width="150" height="75"/>
&nbsp;
</font></b></font></td><td colspan="5" bgcolor="#D6DFEF" height="16" width="100%" bordercolor="#FFFFFF"><font size="3" face="Verdana"></font></td></tr>

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
include ("db.inc.php");
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
<td colspan="5" bgcolor="#B5CBEF" height="17" width="100%" bordercolor="#FFFFFF" background="../images/tile_back.gif">
<font face='Verdana' size=2 color='#FFFFFF'><b>
<center> | <a href="../login/logout.php">Logout</a> |
<a href="../login/home.php">Home</a>  |      
</center></td>
</table></form>
<br><center><font size=1 color="#000000" face="Arial">Qcell Number Change Database  - FIRST Edition<br>Powered by
<b><a href="http://www.qcell.gm">QCell Ltd.</a></b>
<br>The Gambia's Only 3G Operator<br></font> </center>
 
  
