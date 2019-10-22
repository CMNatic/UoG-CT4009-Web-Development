//When 'submit' is detected from the HTML form, perform the following:

$('#BicycleRegistration').on('submit', function(e) {
    alert("Bicycle registered!"); //Browser alert that the bicycle is registered to the user
    console.log(new FormData(this)); //Error catching, console logs what information was inputted into the form.
    
    e.preventDefault();
    
    $.ajax({ //AJAX allows data to be sent back and forth without the users browser needing to be refreshed
        url:"reportabicyclepageDAO.php",
        method:"POST", //communicate with reportabicyclepageDAO.php via POST
        data:new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        success:function(data) {
            console.log(data) //Again, error catching and debugging. Outputs the data that reportabicyclepageDAO.php recieves.
        }
    });
});