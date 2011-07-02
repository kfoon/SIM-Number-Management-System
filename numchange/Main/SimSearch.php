<!DOCTYPE html>
<?php
include ("../Config/db.inc.php");
require_once('../Config/auth.php');
//Sarting pagination 
//Get the required page number from the $_GET array
if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
 } else {
 $pageno = 1;
 } // if
                
//Get the number of total rows in the database
$query = "SELECT count(*) FROM sim_replacement_history ";
$result = mysql_query($query);
$query_data = mysql_fetch_row($result);
$numrows = $query_data[0];

//Calculate the number of $lastpage
$rows_per_page = 23;
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



if(isset($_GET[search]) && ($_GET[search_field] != '') && ($_GET[search_value] != '')){
$search_field = $_GET['search_field'];
$search_value = $_GET['search_value'];

        $cugquery= "select * from  sim_replacement_history where $search_field LIKE '%$search_value%' ORDER BY date_created DESC, time DESC ";
	}else{
	$cugquery = "SELECT * FROM sim_replacement_history ORDER BY date_created DESC, time DESC $limit";
}


?>

<html>
	<head>
		<title>Numchange Records</title>
		<link rel="stylesheet" type="text/css" href="../Css/2c-hd-ft-fixed-layout.css" />
		<link rel="stylesheet" href="../Css/style1.css" type="text/css" media="all" title="" />
	</head>
<body>
<div id="outer">
<div id="hdr" align="center">
</div>
<div id="bar">
<span style="padding:3px;font-size:11px;"><script type='text/javascript' src='../JS/Menu.js'></script></span>
</div>
<div id="cont">
<div id="banner" align="center">	
</div>
<div id="main">
		<form action="SimSearch.php">
			<fieldset>
			Search Field:<select name="search_field" id="search_field">
			<option value="Customer_Name">Customer Name</option>
			<option value="new_sim">Existing Mobile No.</option>
			<option value="lost_sim">Lost Mobile No.</option>
			<option value="date_lost">Date Lost</option>
			<option value="date_created">Date created</option>
			<option value="ref_No1">Reference #1</option>
			<option value="ref_No2">Reference #2</option>
			<option value="ref_No3">Reference #3</option>
			<option value="Address">Address</option>
			</select> 
				Search For:<input type="text" name="search_value"  id="search_value" />
			<input type="submit" value="Search" name="search" id="search">
			</fieldset>
		
		</form>	
		
<table id="matrix" cellpadding="0" cellspacing="0">
<thead>
<tr>
			<th>Ref. Code</th>
			<th>Name</th>
			<th>Address</th>
			<th>New Sim</th>
			<th>Lost Sim</th>
			<th>Date Lost</th>
			<th>Reference #1</th>
			<th>Reference #2</th>
			<th>Reference #3</th>
			<th>Date</th>
			<th>Time</th>
			<th>Operator</th>
 			<th>hlr Tech</th>


		</tr>
</thead>

<tbody>
<?php
 
  $queryresult = mysql_query($cugquery);
 
   while($data = mysql_fetch_array($queryresult)){
	  
      echo("<tr>
	<td><b><font face='Verdana' size='2'>$data[id]</b></td>
	<td> <img src ='../images/128px-User.svg.png'></img>
       <font face='Verdana' size='2'>$data[Customer_Name]</td>
	<td><font face='Verdana' size='2'>$data[Address]</td>
       <td><font face='Verdana' size='2'>$data[new_sim]</td>
      <td><font face='Verdana' size='2'>$data[lost_sim]</td>
      <td><font face='Verdana' size='2'>$data[date_lost]</td>
      <td><font face='Verdana' size='2'>$data[ref_No1]</td>
      <td><font face='Verdana' size='2'>$data[ref_No2]</td>
      <td><font face='Verdana' size='2'>$data[ref_No3]</td>
	<td><font face='Verdana' size='2'>$data[date_created]</td>
	<td><font face='Verdana' size='2'>$data[time]</td>
      <td><font face='Verdana' size='2'>$data[user]</td>
      <td><font face='Verdana' size='2'>$data[switch_tech]
      </td></tr>");
    
  }
     
      ?>
      </tr> 
      <tr><td colspan="13" bgcolor="#B5CBEF" height="25" width="737" background="tile_sub.gif"><p align="center"><font face="Verdana" size="2">
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
    ?>
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
</html>
