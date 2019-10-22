

//Password variables, from html form 'passwordTxt' and 'confirmpasswordTxt'

var password = document.getElementById("passwordTxt");
var confirmPassword = document.getElementById("confirmpasswordTxt");

//Compares both entries in 'passwordTxt' and 'confirmpasswordTxt' and checks if they are the same.
function validatePassword() {
  if(password.value != confirmPassword.value) {
    confirmPassword.setCustomValidity("Passwords Don't Match");
  } 
    else {
    confirmPassword.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirmPassword.onkeyup = validatePassword;


//Event handler for registration form submit 
$('#PublicRegistrationForm').submit(function(event) {
    // cancels the form submission
    formData = $('#PublicRegistrationForm').serialize();
    //alert(formData); //error catching
	event.preventDefault();

	$.ajax({
		
		type: "POST",
		url: "registrationDAO.php",
		data: formData+"&phpfunction=createUser",
		success: function(echoedMsg) {
			//alert (echoedMsg);
            
            //If account has been created, redirect browser to the login page
			if(echoedMsg=="True") {
				window.location="../PublicLoginPage/login.html";
			}
            
            //Else, if the account hasn't been created. Output error message to the HTMl element #divMessage e.g. Passwords don't match.
            else {
				$("#divMessage").html(echoedMsg);
			}
		},
        
        //Output registration failure errors to console for debugging.
		error: function(msg) {
            
			console.log(msg);
		}
	});
});



