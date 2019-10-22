<?php

    /* Create function 'registerBicycle' */

	function registerBicycle() {
		
        /* Data values from .html form to be caught and sent via POST: */
        
		$inputMPNumber = $_POST['inputMPNNbr'];
		$inputBrand = $_POST['inputBrand'];
		$inputType = $_POST['inputType'];
		$inputGears = $_POST['inputGears'];
        $inputAccessorries = $_POST['inputAccessories'];
        $inputColour = $_POST['inputColour'];
        $inputImage = $_POST['inputImage'];
        
        
		/* MySQL Database file containing login credentials */
        
		include "../php/databaseconfig.php";
		
        /* SQL syntax inserting variable defined data into MySQL */ 
		$sql = "INSERT INTO tbl_bicycles(MPNNumber, Brand, Type, Gears, Accessories, Colour)";
        if(!mysql_query($connection, $sql)) { //* Error catching and debugging, if shown, check login credentials */
            
            echo "Bicycle not registered"
        }
        
        else {
            echo "Bicycle successfully registered";
        }
        
        $upload_folder = "../BicycleImages"; /* Upload directory in web root for uploaded images */
        
        foreach($_FILES("images")) as $key => $image_name {
            $temporary_name = $_FILES['images']['temporary'][$key];
            
            /* Checks if uploaded image of the same name exists, if it does - upload is failed to prevent duplicate reportings */
            
            if(file_exists($upload_folder.$image_name)) {
                echo "The Image" . $image_name . "hasn't been uploaded, as it already exists". "<br>";
            }
            
            /* else, allow upload of image and move to image folder */
            
            else {
                move_upload_file($temporary_name, $upload_folder.$image_name);
                echo "The Image" . $image_name . "has been uploaded!"." <br/>";
            }
        }
        
        /* Console debugging, outputs the directory that the file was uploaded too */
        
        $files = array_slice(scandir($upload_folder), 2);
        echo "Directory..." .$upload_folder.;
        ![print_r ($files)][i];
        
?>