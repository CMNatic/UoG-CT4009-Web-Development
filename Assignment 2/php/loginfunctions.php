<?php

if(isset($_POST['phpFunction'])) {
		if($_POST['phpFunction'] == 'checkLogin') {
			checkLogin();
		} elseif($_POST['phpFunction'] == 'Logout') {
			logout();
		}
}


//checks if a cookie exists in browser, if exists - it is deleted so that the account is logged out

function logout () {
        
        $_SESSION = array(); //destroy all of the session variables
        if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
        }
        session_destroy();
        
    //redirect to login.html to indicate the account is signed out.
        header("Location: http://localhost/PublicLoginPage/login.html");
        exit;
        
        
    }

//Checks if the session details of the user match to an already existing account.
function checkLogin() {
	session_start();
	session_regenerate_id(true);
	$userEmail = $_SESSION['email'];
	if( isset( $userEmail ) ) {
		echo 'true';
	} else {
		echo 'false';
	}
}
	
?>