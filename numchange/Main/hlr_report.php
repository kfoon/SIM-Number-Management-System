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
$hlrsql = "UPDATE hlr_request SET hlr_tech = '$hlruser', status = 'Done' WHERE id = '$checkbox' LIMIT 1";
mysql_query($hlrsql);
//$sql = "INSERT INTO report  SELECT * FROM hlr_request WHERE id = '$checkbox'";
$sql = "INSERT INTO report (Customer_Name,Existing_Number,Requested_Number,reg_medium,Location,date,time,status,operator,in_tech,hlr_tech,Address,NIN,active,sales_channel,receipt_no,nationality,DOB)
SELECT Customer_Name,Existing_Number,Requested_Number,reg_medium,Location,date,time,status,operator,in_tech,hlr_tech,Address,NIN,active,sales_channel,receipt_no,nationality,DOB FROM hlr_request WHERE id = '$checkbox' LIMIT 1";
mysql_query($sql);

//$id = $_GET["id"];
//run a query to get the where clause field for the report table
$report = "select Existing_Number, Requested_Number, Customer_Name from hlr_request where id = '$checkbox' LIMIT 1";
$report_result = mysql_query($report);
$row = mysql_fetch_array($report_result);

//update the reports table to reflect the time and date the request is been activated!
$hlr = "update report set act_time = NOW() WHERE Customer_Name = '$row[Customer_Name]' and Requested_Number = $row[Requested_Number] and Existing_Number = $row[Existing_Number] LIMIT 1"; //  WHERE"; // ID = '$id'";
 mysql_query($hlr);

$order = "DELETE FROM hlr_request WHERE id = '$checkbox' LIMIT 1"; //  WHERE"; // ID = '$id'";
 mysql_query($order);
 ++$i;
 } 
 header("location:hlr_table.php");
 ?>   