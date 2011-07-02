<?
//Upate reports table and delete request data
require_once('../Config/auth.php');
include "../Config/db.inc.php";

$inuser = $_SESSION['SESS_USER_LOGIN'];

/**$i=0;
$size = count($_POST['checkbox']);
while ($i < $size){
$checkbox = $_POST['checkbox'][$i];
//update the in_request tables to have the id of the current tech
$insql = "UPDATE in_request SET in_tech = '$inuser', status = 'Pending' WHERE id = '$checkbox' LIMIT 1";
mysql_query($insql); 
//$del_id = $_POST["checkbox[$i]"];
$sql = "INSERT INTO hlr_request  SELECT * FROM in_request WHERE id = '$checkbox' LIMIT 1";
mysql_query($sql);
*/

//get id from the sim_reqest page
$id = $_GET["id"];

$sql = "INSERT INTO unallocate_rep SELECT * FROM sim_replacement WHERE id = $id";
mysql_query($sql);

$order = "DELETE FROM sim_replacement WHERE id = '$id' LIMIT 1"; //  WHERE"; // ID = '$id'";
mysql_query($order); 

/**
 $message="Requested number pending at the Qcell Number Change site.
 ";
 $message = stripslashes($message);
//if list is up to 10 send an email notifaction
 $query = "SELECT count(*) FROM hlr_request";
 $queryresult = mysql_query($query);
 if($queryresult > 10){
 mail("switch@qcell.gm","Number Change Request",$message,"From: Qcell Number Change Program");
 }
 **/
 header("location:Replacememt_table.php");
 ?>   
