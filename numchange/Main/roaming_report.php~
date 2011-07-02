<?
//Upate reports table and delete request data
require_once('../Config/auth.php');
include "../Config/db.inc.php";

$inuser = $_SESSION['SESS_USER_LOGIN'];
$profile = $_SESSION['SESS_LEVEL_PERM'] ;

$i=0;
$size = count($_POST['checkbox']);
while ($i < $size)
{
$checkbox = $_POST['checkbox'][$i];

if($profile == 'IN Tech')
{
//update the in_request tables to have the id of the current tech
$insql = "UPDATE roaming SET in_tech = '$inuser', status = 'Activated', date = NOW(), act_time = NOW() WHERE id = '$checkbox' LIMIT 1";
mysql_query($insql); 
}
else
{
$insql = "UPDATE roaming SET switch_tech = '$inuser', status = 'Activated', date = NOW(), act_time = NOW() WHERE id = '$checkbox' LIMIT 1";
mysql_query($insql);
}

//check the status of the in_tech or hlr_tech if they are activated
$status = "select in_tech, switch_tech from roaming where id = '$checkbox'";
$status_result = mysql_query($status);
$status_row = mysql_fetch_array($status_result);


 if(($status_row['in_tech'] != "Pending") && ($status_row['switch_tech'] != "Pending"))
{
$sql = "INSERT INTO roaming_report (Customer_Name,Address,Number,date,time,operator,switch_tech,in_tech,status,active,NIN,date_req,imsi,act_time)
  SELECT Customer_Name,Address,Number,date,time,operator,switch_tech,in_tech,status,active,NIN,date_req,imsi,act_time FROM roaming WHERE id = '$checkbox'";
mysql_query($sql);

//$id = $_GET["id"];

$order = "DELETE FROM roaming WHERE id = '$checkbox' LIMIT 1"; //  WHERE"; // ID = '$id'";
mysql_query($order);
}
$i++;
}



 $message="Prepaid Roaming number Activated at the Qcell Number Change site.
 ";
 $message = stripslashes($message);
 mail("switch@qcell.gm","Prepaid Roaming Request",$message,"From: Qcell Number Change Program");
 header("location:roaming_table.php");
 ?>   
