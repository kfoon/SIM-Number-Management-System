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
$reference_number1=$_POST['reference_number1'];
$reference_number2=$_POST['reference_number2'];
$reference_number3=$_POST['reference_number3'];
$Address=$_POST['Address'];
$Month=$_POST['Month'];
$Day=$_POST['Day'];
$Year=$_POST['Year'];
$private_number = $_POST['private_number'];
$mca = $_POST['mca'];
$crbt = $_POST['crbt'];

if ($private_number != null){
$private_number = 1;
 }else{
$private_number = 0;
}
if ($mca != null){
$mca = 1;
}else{
$mca = 0;
}
if ($crbt != null){
$crbt = 1;
}else{
$crbt = 0;
}
 
$lostdate = "$Year-$Month-$Day";
$user = $_SESSION['SESS_USER_LOGIN'];
if($errors==1) echo $error;
else{
$where_form_is="http".($HTTP_SERVER_VARS["HTTPS"]=="on"?"s":"")."://".$SERVER_NAME.strrev(strstr(strrev($PHP_SELF),"/"));
$message="Customer Name: ".$Customer_Name."
Sim Number: ".$sim_number."
Lost Number: ".$lostsim_number."
Date Lost: ".$datelost."
Reference Number1: ".$reference_number1."
Reference Number2: ".$reference_number2."
Reference Number3: ".$reference_number3."

";
$message = stripslashes($message);
#mail("switch@qcell.gm","Sim Replacement Request",$message,"From: Qcell Sim Replacement Program");
#$link = mysql_connect("localhost","numchange","Numchange_1");
#mysql_select_db("in_change",$link);
$query="insert into sim_replacement (Customer_Name,new_sim,lost_sim,date_lost,ref_No1,ref_No2,ref_No3,user,date_created,time,status
                                       ,switch_tech,Address,private,mca,crbt) 
        values ('".$Customer_Name."','".$sim_number."','".$lostsim_number."','$lostdate','".$reference_number1."',
        '".$reference_number2."','".$reference_number3."', '$user', NOW(), NOW(), 'Pending', 'none','".$Address."', $private_number, $mca, $crbt)";
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
<tr><td>Reference #1: </td><td> <?php echo $reference_number1; ?> </td></tr>
<tr><td>Reference #2: </td><td> <?php echo $reference_number2; ?> </td></tr>
<tr><td>Reference #3: </td><td> <?php echo $reference_number3; ?> </td></tr>
<tr><td>Private: </td><td> <?php echo $private_number; ?> </td></tr>
<tr><td>MCA: </td><td> <?php echo $mca; ?> </td></tr>
<tr><td>CRBT: </td><td> <?php echo $crbt; ?> </td></tr>
</table>
<a href="replacement_request.php"><b>Back</b></a>
<!-- Do not change anything below this line -->

<?php 
}
?>
