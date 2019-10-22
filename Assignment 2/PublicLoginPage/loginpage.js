$(document).ready(function() {
    
	$.ajax({ //*AJAX allows asynchronous communication between server and client without refereshing / additional submission of HTTP headers
		type: "POST",
		url: "../php/loginfunctions.php", //include functions
		data: "phpFunction=checkLogin",
        
	    success:function(html) {
		//* if the DAO.php file detects the user is logged in, Javascript outputs the browser alert to the user via the following div: */
            
            if(html=='true') {
			$("#divError").html("Account already logged in");
		    //window.location="../PublicAccountSummary/summary.html";
	        }	
	    }
	        
	    });
	
});

//*On submit of the puliclogin form, start 'Login' function on loginfunctions.php
$('publicloginForm').submit(function(event) {
	formData = $('#publicloginForm').seralize();
	formData = formData +'&phpFunction=Login';
alert(formData);
	event.preventDefault();

console.log (formData); //error catching

	$.ajax({
		type: "POST",
		url: 'loginDAO.php',
		data: formData,
		datatype: "json",
	success:function(data) {
		alert (data);
		dataJson = JSON.parse(data);
		firstName = dataJson['First_Name'];
		surName = dataJson['Sur_Name'];

		sessionStorage.setItem('First_Name', firstName);
		sessionStorage.setItem('Sur_Name', surName);

		console.log(firstName + " " + surName);

		if(data == 'false') {
			$("#divMessage").html(data); /* if login fails, tell the user via html element '#divMessage' */
		}
		else { //* If login is successful, redirect browser to the summary/dashboard for their account
			window.location="../PublicAccountSummary/summary.html";
		}
	}

});
});
