<?
//Upate reports table and delete request data
require_once('../Config/auth.php');
include "../Config/db.inc.php";

//grab the HLR user changing the numbers
$hlruser = $_SESSION['SESS_USER_LOGIN'];


$i=0;
$size = count($_POST['checkbox']);
while ($i < $size){
$checkbox = $_POST['checkbox'][$i];

//update the hlr_request table to have the id of the current hlr tech
$hlrsql = "UPDATE sim_replacement SET switch_tech = '$hlruser', status = 'Done'  WHERE id = '$checkbox' LIMIT 1";
mysql_query($hlrsql);
//$sql = "INSERT INTO sim_replacement_history  SELECT * FROM sim_replacement WHERE id = '$checkbox'";
$sql = "INSERT INTO sim_replacement_history  (Customer_Name,new_sim,lost_sim,date_lost,ref_No1,ref_No2,ref_no3,user,date_created,time,status,switch_tech,Address,active,private,mca,crbt)
SELECT Customer_Name,new_sim,lost_sim,date_lost,ref_No1,ref_No2,ref_no3,user,date_created,time,status,switch_tech,Address,active,private,mca,crbt FROM sim_replacement WHERE id = '$checkbox'";
mysql_query($sql);

//$id = $_GET["id"];

$order = "DELETE FROM sim_replacement WHERE id = '$checkbox' LIMIT 1"; //  WHERE"; // ID = '$id'";
 mysql_query($order);
 ++$i;
 } 
 header("location:Replacememt_table.php");
 ?>   
 
