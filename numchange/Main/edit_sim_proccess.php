<?php
  require_once('../Config/auth.php');
  ?>
<?php
include("../Config/config.php");
include("../Config/global.inc.php");
include("../Config/db.inc.php");
$errors=0;
$error="The following errors occured while processing your form input.<ul>";
$Customer_Name=$_POST['Customername'];
$sim_number=$_POST['newsim'];
$lostsim_number=$_POST['oldsim'];
$Address=$_POST['Address'];
$id = $_POST['id'];

$user = $_SESSION['SESS_USER_LOGIN'];
if($errors==1) echo $error;
else{
$where_form_is="http".($HTTP_SERVER_VARS["HTTPS"]=="on"?"s":"")."://".$SERVER_NAME.strrev(strstr(strrev($PHP_SELF),"/"));
$message="Customer Name: ".$Customer_Name."
Sim Number: ".$sim_number."
Lost Number: ".$lostsim_number."

";
$message = stripslashes($message);
#mail("switch@qcell.gm","Sim Replacement Request",$message,"From: Qcell Sim Replacement Program");
#$link = mysql_connect("localhost","numchange","Numchange_1");
#mysql_select_db("in_change",$link);
$query="update sim_replacement set Customer_Name = '".$Customer_Name."',new_sim = '".$sim_number."',lost_sim ='".$lostsim_number."' where id = $id";
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
<tr><td>Customer Name: </td><td> <?php echo $Customer_Name; ?> </td></tr>
<tr><td>New Sim: </td><td> <?php echo $sim_number; ?> </td></tr>
<tr><td>Lost Number: </td><td> <?php echo $lostsim_number; ?> </td></tr>
</table>
<a href="Replacememt_table.php"><b>Back</b></a>
<!-- Do not change anything below this line -->

<?php 
}
?>
