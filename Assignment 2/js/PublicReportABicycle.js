$(document).ready( function() {
    /* When a file is uploaded to the form, perform the following: */
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            
            /*
                Replaces/strips all file path references for the uploaded file. E.g. "C:/Folder/Filename.jpg" becomes just "Filename.jpg"
                
            */ 
            
            
            
		input.trigger('fileselect', [label]);
            
});
    
        /* Once the file is selected, assign the filename to "label" */

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
            /* Once clicked, insert the text of "label" to the "input-group", next to the 'Browse' button on the HTML form to show recursive output to the user, letting them know which file was actually uploaded.
            */
            
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
            /*If the filename is too long, alert it to the browser */
		    }
	    
});
    /* Read inputted data submitted to the #imgUpload' button of the form */
    
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#imgUpload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}
    
    /*Output the results of readURL (an image) to the HTML element (#imgInput) to show the user a copy of the photo that was uploaded for their reference. */

		$("#imgInput").change(function() {
		    readURL(this);
		}); 	
	});