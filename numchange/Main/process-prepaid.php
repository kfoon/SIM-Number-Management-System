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
$Company = $_POST['comp_name'];
$Profession = $_POST['Profession'];
$Address = $_POST['Address'];
$NIN = $_POST['NIN'];
$Industry = $_POST['Industry'];
$contact = $_POST['contact'];
$nationality = $_POST['nationality'];
$DOA = $_POST['DOA'];
$msisdn = $_POST['msisdn'];
$imei = $_POST['imei'];
$email = $_POST['email'];

$user = $_SESSION['SESS_USER_LOGIN'];
if($errors==1) echo $error;
else{
$where_form_is="http".($HTTP_SERVER_VARS["HTTPS"]=="on"?"s":"")."://".$SERVER_NAME.strrev(strstr(strrev($PHP_SELF),"/"));
$message="Customer Name: ".$CustomerName."
Company: ".$Company."
MSISDN: ".$msisdn."
IMEI: ".$imei."
";
$message = stripslashes($message);
//mail("in@qcell.gm","Number Change Request",$message,"From: Qcell Number Change Program");
$link = mysql_connect("localhost","numchange","Numchange_1");
mysql_select_db("in_change",$link);
$query="insert into prepaid_data (Customer_Name,company,Profession,industry,date,time,status,operator,Address,NIN,contact,email, nationality, DOA, msisdn, imei) 
        values ('".$CustomerName."','".$Company."', '".$Profession."','".$Industry."', NOW(), NOW(), 'Done', '$user','".$Address."','".$NIN."', '$contact', '$email', '$nationality', '$DOA', '$msisdn', '$imei')";
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
<tr><td>MSISDN: </td><td> <?php echo $msisdn; ?> </td></tr>
<tr><td>IMEI: </td><td> <?php echo $imei; ?> </td></tr>
</table>
<a href="../Main/prepaid_data.php"><b>Back</b></a>
<!-- Do not change anything below this line -->

<?php 
}
?>