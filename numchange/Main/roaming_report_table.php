<?php
require_once('../Config/auth.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us">
<head>
	<title>Roaming Report</title>
	<link rel="stylesheet" href="../Css/jq.css" type="text/css" media="print, projection, screen" />
	<link rel="stylesheet" href="../Css/style.css" type="text/css" media="print, projection, screen" />
	<link rel="stylesheet" type="text/css"href="../Css/2c-hd-ft-fixed-layout.css" />
	<script type="text/javascript" src="../JS/jquery-latest.js"></script>
	<script type="text/javascript" src="../JS/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="../JS/jquery.tablesorter.pager.js"></script>
	<script type="text/javascript" src="../JS/js/chili/chili-1.8b.js"></script>
	<script type="text/javascript" src="../JS/docs.js"></script>
</head>
<body>
<div id="outer">
<div id="hdr" align="center"></div>
</div>
<div id="bar">
<span style="padding:3px;font-size:11px;"><script type='text/javascript' src='../JS/Menu.js'></script></span>
</div>
<div id="cont">
<div id="banner">	
</div>
<div id="main">
<form enctype='multipart/form-data' action='Replacement_report.php' method='post' >
<table cellspacing="1" class="tablesorter" >
	<thead>
		<tr>
			<th>Ref. Code</th>
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
			<th>Ref. Code</th>
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
             $query = "SELECT count(*) FROM roaming_report";
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
    
    
 $cugquery =  "SELECT * FROM roaming_report ORDER BY date DESC, time DESC $limit";
 $queryresult = mysql_query($cugquery);
 
  $i = 0;
   while($data = mysql_fetch_array($queryresult)){
      echo("<tr>
      <td><b><font face='Verdana' size='2'>$data[id]</b></td>
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
      <tr><td colspan="13" bgcolor="#B5CBEF" height="25" width="737" background="../login/tile_sub.gif"><p align="center"><font face="Verdana" size="2">
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
</form>
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

