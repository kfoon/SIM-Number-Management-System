<?
//Upate reports table and delete request data
require_once('../Config/auth.php');
include "../Config/db.inc.php";

//grab the HLR user changing the numbers
$inuser = $_SESSION['SESS_USER_LOGIN'];


$i=0;
$size = count($_POST['checkbox']);
while ($i < $size){
$checkbox = $_POST['checkbox'][$i];

//update the hlr_request table to have the id of the current hlr tech
$hlrsql = "UPDATE in_request SET in_tech = '$inuser', status = 'Done', time = NOW(), date = NOW()  WHERE id = '$checkbox' LIMIT 1";
mysql_query($hlrsql);
$sql = "INSERT INTO hlr_request  SELECT * FROM in_request WHERE id = '$checkbox'";
mysql_query($sql);

//$id = $_GET["id"];

$order = "DELETE FROM in_request WHERE id = '$checkbox' LIMIT 1"; //  WHERE"; // ID = '$id'";
 mysql_query($order);
 ++$i;
 } 
 header("location:in_table.php");
 ?>   
