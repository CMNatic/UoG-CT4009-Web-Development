<?php

/* phpFunctions for the login page. 

If checkLogin is true, go to function (checkLogin)

If Logout is true, go to function (Logout)

*/
if(isset($_POST['phpFunction'])) {
    
		if($_POST['phpFunction'] == 'checkLogin') {
			checkLogin();
		}
    
        elseif($_POST['phpFunction'] == 'Logout') {
			logout();
		}
}


/* Checks if a cookie exists, if true, then the user is logged in. This function destroy's the cookie, so the Server looses track if the user is logged in or not - automatically logging them out.
*/

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
        
        header("Location: http://localhost/PublicLoginPage/login.html");
        exit;
        
        
    }

/* Checks the database for $userEmail and $password */

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