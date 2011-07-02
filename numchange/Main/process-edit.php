<?php
  require_once('../Config/auth.php');
  ?>
<?php
include("../Config/config.php");
include("../Config/global.inc.php");
$errors=0;
$error="The following errors occured while processing your form input.<ul>";
/*pt_register('POST','CustomerName');
pt_register('POST','RequstedNumber');
pt_register('POST','Location');
pt_register('POST','Address');
pt_register('POST','NIN');
*/
$CustomerName = $_POST['CustomerName'];
$RequstedNumber = $_POST['RequstedNumber'];
$Location = $_POST['Location'];
$Address = $_POST['Address'];
$NIN = $_POST['NIN'];
$receipt_no = $_POST['receipt_no'];
$Sales_Channel = $_POST['Sales_Channel'];
$nationality = $_POST['nationality'];
$DOB = $_POST['DOB'];
$RegMedium = $_POST['Registration_Medium'];
$id = $_POST['id'];

$user = $_SESSION['SESS_USER_LOGIN'];
if($errors==1) echo $error;
else{
$where_form_is="http".($HTTP_SERVER_VARS["HTTPS"]=="on"?"s":"")."://".$SERVER_NAME.strrev(strstr(strrev($PHP_SELF),"/"));
$message="Customer Name: ".$CustomerName."
Existing Number: ".$ExistingNumber."
Requsted Number: ".$RequstedNumber."
Location: ".$Location."
";
$message = stripslashes($message);
//mail("in@qcell.gm","Number Change Request",$message,"From: Qcell Number Change Program");
$link = mysql_connect("localhost","numchange","Numchange_1");
mysql_select_db("in_change",$link);
$query="update register set Customer_Name ='".$CustomerName."',Requested_Number ='".$RequstedNumber."', reg_medium ='".$RegMedium."',Location ='".$Location."', status = 'Updated',operator = '$user',Address = '".$Address."',NIN = '".$NIN."',receipt_no = '$receipt_no',sales_channel = '$Sales_Channel', nationality ='$nationality', DOB ='$DOB'  where id = $id";
mysql_query($query);
//$make=fopen("../admin/data.dat","a");
//$to_put="";
//$to_put .= $CustomerName."|".$ExistingNumber."|".$RequstedNumber."|".$Location."
//";
//fwrite($make,$to_put);
//if list is up to 10 send an email notifaction
// $query = "SELECT count(*) FROM in_request";  
//  $queryresult = mysql_query($query);
//   if($queryresult > 10){
//  mail("in@qcell.gm","Number Change Request",$message,"From: Qcell Number Change Program");
//  }
     
?>


<!-- This is the content of the Thank you page, be careful while changing it -->

<h2>Thank you! The Request is been process</h2>

<table width=50%>
<tr><td>Customer Name: </td><td> <?php echo $CustomerName; ?> </td></tr>
<tr><td>Address: </td><td> <?php echo $Address; ?> </td></tr>
<tr><td>Requsted Number: </td><td> <?php echo $RequstedNumber; ?> </td></tr>
<tr><td>Location: </td><td> <?php echo $Location; ?> </td></tr>
</table>
<a href="../Main/Purchase.php"><b>Back</b></a>
<!-- Do not change anything below this line -->

<?php 
}
?>