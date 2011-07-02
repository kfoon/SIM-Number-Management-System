<?php
  require_once('../Config/auth.php');
  ?>
<?php
include("../Config/config.php");
include("../Config/global.inc.php");
$errors=0;
$error="The following errors occured while processing your form input.<ul>";
$CustomerName=$_POST['Customername'];
$Address=$_POST['Address'];
$Mob_Number=$_POST['Mob_Number'];
$NIN=$_POST['NIN'];
$IMSI_Number=$_POST['IMSI_Number'];
$user = $_SESSION['SESS_USER_LOGIN'];

if($errors==1) echo $error;
else{
$where_form_is="http".($HTTP_SERVER_VARS["HTTPS"]=="on"?"s":"")."://".$SERVER_NAME.strrev(strstr(strrev($PHP_SELF),"/"));
$message="Customer Name: ".$CustomerName."
Mobile Number: ".$Mob_Number."
Address: ".$Address."
";
$message = stripslashes($message);
mail("switch@qcell.gm","Prepaid Roaming Request",$message,"From: Qcell Roaming Request Program");
$link = mysql_connect("localhost","numchange","Numchange_1");
mysql_select_db("in_change",$link);

$query="INSERT INTO roaming (Customer_Name,Address,Number,date,time,operator,in_tech,switch_tech,status,NIN,date_req,imsi) 
        VALUES ('".$CustomerName."','".$Address."','".$Mob_Number."',NOW(),NOW(),'$user','Pending','Pending','Pending','".$NIN."',NOW(), '".$IMSI_Number."')";
mysql_query($query);
//$make=fopen("../admin/data.dat","a");
//$to_put="";
//$to_put .= $CustomerName."|".$ExistingNumber."|".$RequstedNumber."|".$Location."
//";
//fwrite($make,$to_put);
?>


<!-- This is the content of the Thank you page, be careful while changing it -->

<h2>Thank you! The Request is been process</h2>

<table width=50%>
<tr><td>Customer Name: </td><td> <?php echo $CustomerName; ?> </td></tr>
<tr><td>Mobile Number: </td><td> <?php echo $Mob_Number; ?> </td></tr>
<tr><td>Address: </td><td> <?php echo $Address; ?> </td></tr>
<tr><td>National ID: </td><td> <?php echo $NIN; ?> </td></tr>
</table>
<a href="roaming_request.php"><b>Back</b></a>
<!-- Do not change anything below this line -->

<?php 
}
?>
