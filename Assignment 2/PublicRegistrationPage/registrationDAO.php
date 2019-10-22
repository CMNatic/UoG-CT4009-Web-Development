<?php

	if($_POST['phpfunction'] == 'createUser') {
		createUser();
	}

    /* PHP variables for data to be submitted into MySQL table 'tbl_users' */
	function createUser() {
		
		$firstname = $_POST['firstName'];
		$surname = $_POST['surName'];
		$email = $_POST['email'];
		$pass = $_POST['password'];

        /* MySQL database configuration info such as Login credentials */
		include "../php/databaseconfig.php";
		
        /* Indexes 'tbl_users' for the submitted email, if exists - echo to the user that an account with that email is already registered. */
		$sql = "SELECT * FROM `tbl_users` WHERE email='$email'";
		$query = mysqli_query($connection, $sql);
		
		if (mysqli_num_rows($query) >0){
			echo"This email is already registered.";
			return;
		}
        
        /* If no existing email is found, insert it into the table */
		
				
		$sql = "INSERT INTO `tbl_users`".
			   " values ".
			   "('$firstname', '$surname', '$email', '$pass', NOW(), '$verificationcode', '0')";
		
		
        /* Checks if MySQL connection completes */
        
		if(mysqli_query($connection, $sql)) {
			echo "Connection successful"; /* Error catching */
		} 
        
        else {
			echo mysqli_error($connection);
		}
		
		mysqli_close($connection);
	} 

?>