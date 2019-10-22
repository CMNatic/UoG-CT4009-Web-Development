<?php

require_once '../php/databaseconfig.php'; //Use for MySQL login credentials and database.
require_once '../php/loginfunctions.php'; //Import login functions (loginUser) and (logout)

if($_POST['phpFunction'] == 'Login') {
	login();
}

function login() {
	session_start();
	include '../php/databaseconfig.php';



	$userEmail = $_POST['email']; //assign $userEmail to 'email'
	$passWord = $_POST['password']; //assign $passWord to 'passWord'

    /* MySQL Input validation & sanitisation to prevent SQL Injections revealing database entries */
	$userEmail = stripslashes( $userEmail );
	$passWord = stripslashes( $passWord );
	
	$userEmail = mysqli_escape_string( $connection, $userEmail );
	$passWord = mysqli_escape_string( $connection,$passWord );
    
    /*MySQL syntax to read stored data First_Name and Sur_Name from tbl_users database against the entered values of $userEmail and %passWord */

	$sql = "SELECT First_Name, Sur_Name FROM `tbl_users` WHERE email='".$userEmail."' AND password='".$passWord."'";

	echo $sql;

	/* if an entry matching the values of $userEmail and $passWord is found in the table, output the row */ 
    $res = mysqli_query($connection, $sql);
	$num_row = mysqli_num_rows($res); 
	$row = mysqli_fetch_assoc($res);

	$count = mysqli_num_rows($result);
    
	echo $count;
	//Save successfully login email to session

	if( $num_row == 1 ) { //*If it exists */
		echo json_encode($row);
		echo $userEmail;
		$_SESSION['email'] = $userEmail;
	}
	else {
		echo 'Login doest exist!'; /* Login doesn't exist */
	}

}
?>