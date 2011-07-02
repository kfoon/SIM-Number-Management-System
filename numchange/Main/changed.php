<?php
require_once('../Config/auth.php');
?>

<link href="../loginmodule.css" rel="stylesheet" type="text/css" />

<form enctype='multipart/form-data' action='hlr_report.php' method='post'>
<table border="1" cellspacing="1" style="border-collapse: collapse" bordercolor="#000066" width="95%" cellpadding="5">
<tr>
<td colspan="11"  bgcolor="#B5CBEF" height="17" width="100%" bordercolor="#FFFFFF" background="../images/tile_back.gif">
<p align="left\><b><font face="Verdana" size="2" color="#FFFFFF"><img border="0" src="../images/nav_m.gif" width="8" height="8">
<font face='Verdana' size=2 color='#FFFFFF'><b>
Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></br>
<a href="../login/ ../login/member-profile.php">My Profile</a> | <a href="../login/ ../login/logout.php">Logout</a> |
<a href="../login/ ../login/member-index.php">New Request</a>  |
<a href="../login/ ../main/in_request.php">IN Request Table</a>  |
<a href="../login/ ../main/hlr_request.php">HLR Request Table</a>  |
<a href="Search.php">Search</a> |
<a href="../login/summary.php">Summary</a>
<!- You can add a form title here -->
<title> Qcell - Number Change Request </title>
&nbsp;
</font><font face="Verdana" size="2" color="#000066"> </font></b></td>
</tr><tr><td colspan="3" bgcolor="#B5CBEF" height="16" width="100%" bordercolor="#FFFFFF" background="../login/tile_sub.gif"><font size="2" face="Verdana"><b><font face="Verdana" size="2" color="#000066">
<!- You can add a brief form description here-->
<img alt="logo" src="../images/QCELL.jpg"  width="150" height="75"/>
&nbsp;
</font></b></font></td><td colspan="11" bgcolor="#D6DFEF" height="16" width="100%" bordercolor="#FFFFFF"><font size="3" face="Verdana">
<?php $cug_name = $_POST['CUGname'];
 echo "<font face='Verdana' size='2'><b> $cug_name"; ?> History Report Table</font></td></tr>
 
 <tr>
 <th width="14%"><font face="Verdana" size="2">Name</th>
 <th width="13%"><font face="Verdana" size="2">Address</th>
 <th width="7%"><font face="Verdana" size="2">NIN</th>
 <th width="8%"><font face="Verdana" size="2">Existing No.</th>
 <th width="9%"><font face="Verdana" size="2">Requested No.</th>
 <th width="10%"><font face="Verdana" size="2">Location</th>
 <th width="6%"><font face="Verdana" size="2">Date</th>
 <th width="6%"><font face="Verdana" size="2">Time</th>
 <th width="9%"><font face="Verdana" size="2">Operator</th>
 <th width="9%"><font face="Verdana" size="2">IN Tech</th>
 <th width="9%"><font face="Verdana" size="2">HLR Tech</th>
 </tr>
 <tr>
 <?php
 include ("../Config/db.inc.php");

//Sarting pagination 
//Get the required page number from the $_GET array
if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
 } else {
 $pageno = 1;
 } // if
                
//Get the number of total rows in the database
$query = "SELECT count(*) FROM report";
$result = mysql_query($query);
$query_data = mysql_fetch_row($result);
$numrows = $query_data[0];

//Calculate the number of $lastpage
$rows_per_page = 20;
$lastpage      = ceil($numrows/$rows_per_page);

//Ensure taht $pageno is within range
$pageno = (int)$pageno;
if ($pageno > $lastpage) {
   $pageno = $lastpage;   
  } // if
  if ($pageno < 1) {
  $pageno = 1;   
  } // if
                  
//Construct LIMIT clause
$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;
                  
//issue the database query
 $cugquery = "SELECT * FROM report ORDER BY date DESC, time DESC $limit";
 $queryresult = mysql_query($cugquery) or trigger_error("SQL", E_USER_ERROR);
  
  $i = 0;
   while($data = mysql_fetch_array($queryresult)){
      echo("<tr><td> <input type = 'checkbox' name = 'checkbox[]' value = '$data[id]' />
      <font face='Verdana' size='2'>$data[Customer_Name]</td>
      <td><font face='Verdana' size='2'>$data[Address]</td>
      <td><font face='Verdana' size='2'>$data[NIN]</td>
      <td><font face='Verdana' size='2'>$data[Existing_Number]</td>
      <td><font face='Verdana' size='2'>$data[Requested_Number]</td>
      <td><font face='Verdana' size='2'>$data[Location]</td>
      <td><font face='Verdana' size='2'>$data[date]</td>
      <td><font face='Verdana' size='2'>$data[time]</td>
      <td><font face='Verdana' size='2'>$data[operator]</td>
      <td><font face='Verdana' size='2'>$data[in_tech]</td>
      <td><font face='Verdana' size='2'>$data[hlr_tech]</td></tr>");
      }
       $i++;
      ?>
      </tr> 
      <tr><td colspan="11" bgcolor="#B5CBEF" height="25" width="737" background="../login/tile_sub.gif"><p align="center"><font face="Verdana" size="2">
      <!--<?php $level =  $_SESSION['SESS_LEVEL_PERM'];?>
      <?php if ($level == "Administrator" || $level == "IN_Tech" ){
      echo "<input type=submit value='Activated'>";
      }
    ?>-->
    <?php
    if ($pageno == 1) {
    echo " FIRST PREV ";
    } else {
    echo " <a href='{$_SERVER['PHP_SELF']}?pageno=1'>FIRST</a> ";
    $prevpage = $pageno-1;
    echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$prevpage'>PREV</a> ";
    } // if
                  
    //Inform user of current position
    echo " [ Page $pageno of $lastpage  ] ";
                  
    //Link for the next pages
    if ($pageno == $lastpage) {
    echo " NEXT LAST ";
    } else {
    $nextpage = $pageno+1;
    echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$nextpage'>NEXT</a> ";
    echo " <a href='{$_SERVER['PHP_SELF']}?pageno=$lastpage'>LAST</a> ";
    } // if
    ?>
    </font></td></tr>
    <td colspan="11" bgcolor="#B5CBEF" height="17" width="100%" bordercolor="#FFFFFF" background="../images/tile_back.gif">
    <font face='Verdana' size=2 color='#FFFFFF'><b>
    <center> | <a href="../login/logout.php">Logout</a> |
   <a href="../login/member-index.php">Home</a>  |
  </center></td>
  </table></form>
   <br><center><font size=1 color="#000000" face="Arial">QCell Number Change Database  - FIRST Edition<br>Powered by
   <b><a href="http://www.qcell.gm">QCell Ltd.</a></b>
  <br>The Gambia's Only 3G Operator<br></font> </center>