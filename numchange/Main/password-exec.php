<?php
	//Start session
	session_start();

// check if member is login
  require_once('../Config/auth.php');	

	//Include database connection details
	require_once('../Config/config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	//$fname = clean($_POST['fname']);
	//$lname = clean($_POST['lname']);
	$login = $_SESSION['SESS_USER_LOGIN'];
	$password = clean($_POST['password']);
	$cpassword = clean($_POST['cpassword']);
	//$department = clean($_POST['Department']);
	//Input Validations
	/*if($fname == '') {
	//	$errmsg_arr[] = 'First name missing';
		$errflag = true;
	}
	if($lname == '') {
		$errmsg_arr[] = 'Last name missing';
		$errflag = true;
	}
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}*/
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($cpassword == '') {
		$errmsg_arr[] = 'Confirm password missing';
		$errflag = true;
	}
	if( strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	//if($department == '') {
	//	$errmsg_arr[] = 'User Department missing';
	//	$errflag = true;
	//}
	               
	//Check for duplicate login ID
	/*if($login != '') {
		$qry = "SELECT * FROM members WHERE login='$login'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'Login ID already in use';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed");
		}
	}*/
	
	//If there are input validations, redirect back to the password form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: change-password.php");
		exit();
	}

	//Create INSERT query
	$qry = "UPDATE members SET passwd='".md5($_POST['password'])."' WHERE login='$login'";
	$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		header("location: Home.php");
		exit();
	}else {
		die("Query failed");
	}
?>