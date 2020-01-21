<?php  

// If the Search button is pressed...
if (isset($_POST['Search'])){
	
	// File to connect to the db
	require 'db.php';

	// Sets the values of the text boxes to variables
	$location = $_POST['Location'];
	$age = $_POST['Age'];
	$startdate = $_POST['StartDate'];
	$enddate = $_POST['EndDate'];

	// if all the text boxes are empty send the user back to the page with an error message 
	if(empty($location) || empty($age) || empty($startdate) || empty($enddate)) {

		header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/rent-car.php?error=emptyfields");
		exit();
	}

	else {
		// send the user to the next opage with the info tehy submitted in the URL
		header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/filtered-search.php?success=yes&Location=$location&Age=$age&StartDate=$startdate&EndDate=$enddate");
		exit();
		

	}

}


else {
	// if they somehow got through send them back to the page.
	header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/rent-car.php");
	exit();
}










?>