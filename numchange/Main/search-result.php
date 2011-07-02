<?php

require_once('../Config/auth.php');
 include ("../Config/db.inc.php");
//Function to sanitize values received from the form. Prevents SQL injection
  
  function clean($str) {
  $str = @trim($str);
  if(get_magic_quotes_gpc()) {
  $str = stripslashes($str);
  }
  return mysql_real_escape_string($str);
  }
//get post values

$table = clean($_POST['table']);
$address = clean($_POST['Address']);
$sales_channel = clean($_POST['Sales_Channel']);
$reg_medium = clean($_POST['Registration_Medium']);
$nationality = clean($_POST['Nationality']);
$location = clean($_POST['Location']);
$user = clean($_POST['member']);
$from_date = clean($_POST['from_date']);
$to_date = clean($_POST['to_date']);

//construct the where clause
$where = "where id <> '' ";
if($address != '' || $address != NULL){
$where = $where."AND Address = '$address'";
}
if($sales_channel != '' || $sales_channel != NULL){
$where = $where."AND sales_channel = '$sales_channel'";
}
if($reg_medium != '' || $reg_medium != NULL){
$where = $where."AND reg_medium = '$reg_medium'";
}
if($nationality != '' || $nationality != NULL){
$where = $where."AND nationality = '$nationality'";
}
if($location != '' || $location != NULL){
$where = $where."AND Location = '$location'";
}
if($user != '' || $user != NULL){
$where = $where."AND operator = '$user'";
}
if(($from_date != '' || $from_date != NULL)&&($to_date != '' || $to_date != NULL )&&($table != 'sim_replacement_history')){
$where = $where."AND date between '$from_date' AND '$to_date'";
}
if(($from_date != '' || $from_date != NULL)&&($to_date != '' || $to_date != NULL )&&($table == 'sim_replacement_history')){
$where = $where."AND date_created between '$from_date' AND '$to_date'";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us">
<head>
	<title>Reports Generator </title>
	<link rel="stylesheet" href="../Css/jq.css" type="text/css" media="print, projection, screen" />
	<link rel="stylesheet" href="../Css/style.css" type="text/css" media="print, projection, screen" />
	<link rel="stylesheet" type="text/css" href="../Css/2c-hd-ft-fixed-layout.css" />
	<script type="text/javascript" src="../JS/jquery-latest.js"></script>
	<script type="text/javascript" src="../JS/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="../JS/jquery.tablesorter.pager.js"></script>
	<script type="text/javascript" src="../login/js/chili/chili-1.8b.js"></script>
	<script type="text/javascript" src="../JS/docs.js"></script>
	<script type="text/javascript">
	$(function() {
	
	</script>
</head>
<body>
<div id="outer">
<div id="hdr" align="center">
</div>
<div id="bar">
<span style="padding:3px;font-size:11px;"><script type='text/javascript' src='../JS/Menu.js'></script></span>
</div>
<div id="cont">
<div id="banner">	
</div>
<div id="main">

<?php 

if($table == "register"){
echo'
<table cellspacing="1" class="tablesorter" >
	<thead>
		<tr>
			<th >Customer Name</th>
			<th>Address</th>
			<th>ID No.</th>
			<th >Registered No</th>
			<th >Date</th>
			<th >Sales Channel</th>
			<th>Nationality</th>
			<th>Date of Birth</th>
			<th >receipt_no</th>
			<th>Reg. Medium</th>
			<th >Operator</th>

		</tr>
	</thead>
	<tfoot>
		<tr>
		<th >Customer Name</th>
		 <th>Address</th>
		 <th>ID No.</th>
		 <th >Registered No</th>
		 <th >Date</th>
		 <th >Sales Channel</th>
		 <th>Nationality</th>
		 <th>Date of Birth</th>
		 <th >receipt_no</th>
		 <th>Reg. Medium</th>
		<th >Operator</th>
		</tr>
	</tfoot>
	<tbody>
		<tr>';

//Sarting pagination 
//Get the required page number from the $_GET array
if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
  
 } else {
 $pageno = 1;
 } // if
                
//Get the number of total rows in the database
$query = "SELECT count(*) FROM register $where";
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
 $cugquery = "SELECT * FROM register $where ORDER BY date DESC, time DESC";
 $queryresult = mysql_query($cugquery);
 
echo "<tr><td colspan='9'>&nbsp;</td><th>Total Number of Records</th><th>$numrows</th></tr>";
  $i = 0;
   while($data = mysql_fetch_array($queryresult)){
      echo"<tr><td>";
     if($_SESSION['SESS_LEVEL_PERM'] == 'Administrator'){
     echo"<a href='edit_details.php?id=$data[id]' style=text-decoration:none> <img src ='../images/128px-User.svg.png' style='border:0px'></img></a>
<font face='Verdana' size='2'>$data[Customer_Name]</td>
      <td><font face='Verdana' size='2'>$data[Address]</td>
      <td><font face='Verdana' size='2'>$data[NIN]</td>
      <td><font face='Verdana' size='2'>$data[Requested_Number]</td>
      <td><font face='Verdana' size='2'>$data[date]</td>
      <td><font face='Verdana' size='2'>$data[sales_channel]</td>
      <td><font face='Verdana' size='2'>$data[nationality]</td>
      <td><font face='Verdana' size='2'>$data[DOB]</td>
      <td><font face='Verdana' size='2'>$data[receipt_no]</td> 
	<td><font face='Verdana' size='2'>$data[reg_medium]</td>
	<td><font face='Verdana' size='2'>$data[operator]
     
      </td></tr>";
	}else{
echo "<img src ='../images/128px-User.svg.png' style='border:0px'></img>
       <font face='Verdana' size='2'>$data[Customer_Name]</td>
      <td><font face='Verdana' size='2'>$data[Address]</td>
      <td><font face='Verdana' size='2'>$data[NIN]</td>
      <td><font face='Verdana' size='2'>$data[Requested_Number]</td>
      <td><font face='Verdana' size='2'>$data[date]</td>
      <td><font face='Verdana' size='2'>$data[sales_channel]</td>
      <td><font face='Verdana' size='2'>$data[nationality]</td>
      <td><font face='Verdana' size='2'>$data[DOB]</td>
      <td><font face='Verdana' size='2'>$data[receipt_no]</td> 
	<td><font face='Verdana' size='2'>$data[reg_medium]</td>
	<td><font face='Verdana' size='2'>$data[operator]
     
      </td></tr>";
    }
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
		</tbody>
</table>
<div id ="next" align="center">
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

}

if($table == "report"){
echo'<table cellspacing="1" class="tablesorter" >
	<thead>
		<tr>
			<th >Customer Name</th>
			<th>Address</th>
			<th >Existing No</th>
			<th >Requsted No</th>
			<th >Sales Channel</th>
			<th >Date</th>
			<th >Time</th>
 			<th >IN Tech</th>
 			<th > Hlr Tech</th>
			<th>Activated Date/Time</th>
			<th >Status</th>

		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Customer Name</th>
			<th>Address</th>
			<th>Existing No</th>
			<th>Requsted No</th>
			<th>Sales Channel</th>
			<th>Date</th>
			<th>Time</th>
 			<th>IN Tech</th>
 			<th > Hlr Tech</th>
			<th>Activated Date/Time</th>
			<th>Status</th>

		</tr>
	</tfoot>
	<tbody>
		<tr>';

//Sarting pagination 
//Get the required page number from the $_GET array
if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
 } else {
 $pageno = 1;
 } // if
                
//Get the number of total rows in the database
$query = "SELECT count(*) FROM report $where";
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
 $cugquery = "SELECT * FROM report $where ORDER BY date DESC, time DESC ";
 $queryresult = mysql_query($cugquery);
 
echo "<tr><td colspan='9'>&nbsp;</td><th>Total Number of Records</th><th>$numrows</th></tr>";
  $i = 0;
   while($data = mysql_fetch_array($queryresult)){
      echo("<tr><td> <img src ='../images/128px-User.svg.png'></img>
       <font face='Verdana' size='2'>$data[Customer_Name]</td>
       <td><font face='Verdana' size='2'>$data[Address]</td>
       <td><font face='Verdana' size='2'>$data[Existing_Number]</td>
      <td><font face='Verdana' size='2'>$data[Requested_Number]</td>
      <td><font face='Verdana' size='2'>$data[sales_channel]</td>
      <td><font face='Verdana' size='2'>$data[date]</td>
      <td><font face='Verdana' size='2'>$data[time]</td>
      <td><font face='Verdana' size='2'>$data[in_tech]</td>
      <td><font face='Verdana' size='2'>$data[hlr_tech]</td>
      <td><font face='Verdana' size='2'>$data[act_time]</td>
      <td><font face='Verdana' size='2'>$data[status]
      </td></tr>");
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
		</tbody>
</table>
<div id ="next" align="center">
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


}

if($table == "sim_replacement_history"){

echo'<table cellspacing="1" class="tablesorter" width=100%>
	<thead>
		<tr>
			<th>Customer Name</th>
			<th>New Sim</th>
			<th>Old Sim</th>
			<th>Date Lost</th>
			<th>Reference #1</th>
			<th>Reference #2</th>
 			<th>Reference #3</th>
 			<th>Operator</th>
			<th>switch tech</th>
 			<th>Date</th>
 			<th>Time</th>
 			<th>Status</th>
 			

		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Customer Name</th>
			<th>New Sim</th>
			<th>Old Sim</th>
			<th>Date Lost</th>
			<th>Reference #1</th>
			<th>Reference #2</th>
 			<th>Reference #3</th>
 			<th>Operator</th>
			<th>switch tech</th>
 			<th>Date</th>
 			<th>Time</th>
 			<th>Status</th>
 			

		</tr>
	</tfoot>
	<tbody>
		<tr>';

//Sarting pagination 
//Get the required page number from the $_GET array
if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno']; 
   } else {
    $pageno = 1;
     } // if
             
             //Get the number of total rows in the database
             $query = "SELECT count(*) FROM sim_replacement_history $where";
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
    
    
 $cugquery =  "SELECT * FROM sim_replacement_history $where ORDER BY date_created DESC, time DESC";
 $queryresult = mysql_query($cugquery);
 
echo "<tr><td colspan='9'>&nbsp;</td><th colspan='2'>Total Number of Records</th><th>$numrows</th></tr>";
  $i = 0;
   while($data = mysql_fetch_array($queryresult)){
      echo("<tr>
      <td><img src ='../images/128px-User.svg.png'></img> <font face='Verdana' size='2'>$data[Customer_Name]</td>
       <td><font face='Verdana' size='2'>$data[new_sim]</td>
      <td><font face='Verdana' size='2'>$data[lost_sim]</td>
      <td><font face='Verdana' size='2'>$data[date_lost]</td>
      <td><font face='Verdana' size='2'>$data[ref_No1]</td>
      <td><font face='Verdana' size='2'>$data[ref_No2]</td>
      <td><font face='Verdana' size='2'>$data[ref_No3]</td>
      <td><font face='Verdana' size='2'>$data[user]</td>
	<td><font face='Verdana' size='2'>$data[switch_tech]</td>
      <td><font face='Verdana' size='2'>$data[date_created]</td>
      <td><font face='Verdana' size='2'>$data[time]</td>
      <td><font face='Verdana' size='2'>$data[status]
      </td></tr>");
      }
       $i++;
      ?>
		</tr>
		</tr> 
      <tr><td colspan="12" bgcolor="#B5CBEF" height="25" width="737" background="../login/tile_sub.gif"><p align="center"><font face="Verdana" size="2">
		</tbody>
</table>
<div id ="next" align="center">
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

}

if($table == "roaming_report"){

echo'<table cellspacing="1" class="tablesorter" >
	<thead>
		<tr>
			<th  >Customer Name</th>
			<th  >Address</th>
			<th  >Number</th>
			<th  >Request Date</th>
			<th  >Request Time</th>
			<th  >Operator</th>
			<th  >IN_tech</th>
 			<th  >Switch_tech</th>
 			<th>IMSI</th>
			<th  >Activated Date</th>
			<th  >Activated Time</th>
 			<th>Status</th>
 			

		</tr>
	</thead>
	<tfoot>
		<tr>
			<th  >Customer Name</th>
			<th  >Address</th>
			<th  >Number</th>
			<th  >Request Date</th>
			<th  >Request Time</th>
			<th  >Operator</th>
			<th  >IN_tech</th>
 			<th  >Switch_tech</th>
 			<th>IMSI</th>
			<th  >Activated Date</th>
			<th  >Activated Time</th>
 			<th>Status</th>
 			

		</tr>
	</tfoot>
	<tbody>
		<tr>';

//Sarting pagination 
//Get the required page number from the $_GET array
if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno']; 
   } else {
    $pageno = 1;
     } // if
             
             //Get the number of total rows in the database
             $query = "SELECT count(*) FROM roaming_report $where";
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
    
    
 $cugquery =  "SELECT * FROM roaming_report $where ORDER BY date DESC, time DESC";
 $queryresult = mysql_query($cugquery);
 
echo "<tr><td colspan='10'>&nbsp;</td><th>Total Number of Records</th><th>$numrows</th></tr>";
  $i = 0;
   while($data = mysql_fetch_array($queryresult)){
      echo("<tr>
      
      <td><img src ='../images/128px-User.svg.png'></img> <font face='Verdana' size='2'>$data[Customer_Name]</td>
       <td><font face='Verdana' size='2'>$data[Address]</td>
      <td><font face='Verdana' size='2'>$data[Number]</td>
      <td><font face='Verdana' size='2'>$data[date_req]</td>
      <td><font face='Verdana' size='2'>$data[time]</td>
      <td><font face='Verdana' size='2'>$data[operator]</td>
	 <td><font face='Verdana' size='2'>$data[in_tech]</td>
      <td><font face='Verdana' size='2'>$data[switch_tech]</td>
      <td><font face='Verdana' size='2'>$data[imsi]</td>
      <td><font face='Verdana' size='2'>$data[date]</td>
      <td><font face='Verdana' size='2'>$data[act_time]</td>
      <td><font face='Verdana' size='2'>$data[status]</td>
      </tr>");
      }
       $i++;
      ?>
		</tr>
		</tr> 
      <tr><td colspan="12" bgcolor="#B5CBEF" height="25" width="737" background="../login/tile_sub.gif"><p align="center"><font face="Verdana" size="2">
		</tbody>
</table>
<div id ="next" align="center">
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
}
    ?>
    </div>
</div>
</div>
</div>
<br/>
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
