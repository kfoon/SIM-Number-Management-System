<?php
require_once('../Config/auth.php');
include("../Config/global.inc.php");
$user = $_SESSION['SESS_USER_LOGIN'];
$tech = $_SESSION['SESS_LEVEL_PERM'];
$errors=0;
$error="The following errors occured while processing your form input.<ul>";
pt_register('POST','CUGid');
pt_register('POST','CUGindex');
$size = count($_POST['checkbox']);
if($errors==1) echo $error;
else{
$where_form_is="http".($HTTP_SERVER_VARS["HTTPS"]=="on"?"s":"")."://".$SERVER_NAME.strrev(strstr(strrev($PHP_SELF),"/"));

$link = mysql_connect("localhost","numchange","Numchange_1");
mysql_select_db("in_change",$link);

$i = 0;
while ($i < $size){
$checkbox = $_POST['checkbox'][$i];
$query="DELETE FROM  members WHERE member_id = '$checkbox' LIMIT 1";
mysql_query($query);
++$i;
}
}

?>
<?php 
//echo "<meta http-equiv=refresh content=\"0; URL=users-report.php\">";
header ("location: members-table.php");
?>
