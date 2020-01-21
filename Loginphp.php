<?php  

// If the Login button is pressed...
if (isset($_POST['Login'])){
	
	// File to connect to the db
	require 'db.php';

	// Sets the values of the text boxes to variables
	$username = $_POST['Email'];
	$password = $_POST['Password'];

	// if all the text boxes are empty send the user back to the page with an error message 
	if(empty($username) || empty($password)) {

		header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/login.php?error=emptyfields");
		exit();
	}


	// If the user has entered an invalid email send them back to the apge with an error message
	else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
		
		header("Location: http://www2.macs.hw.ac.uk/~jw97CitiRentals/login.php?error=InvalidEmail");
		exit();
	}

	else {

		$sql = "SELECT * FROM Users WHERE username=?";
		$stmt = mysqli_stmt_init($conn);
		
		// if the user has tried to perform an SQL injection they will be sent back to the page with an error message or if 
		// the connection  has failed they will be sent back wirth an error message
		if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/login.php?error=sqlerror");
		exit();
		}

		else{

			// changes the '?' in the prepared statment to the username and makes sure that the values are suitable 
			// to that of a string or "s"
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);

			// Stores the result in a variable
			$result = mysqli_stmt_get_result($stmt);

			// Since the resukt that is stored in teh variable is raw data, it needs to get tunrned into an array of information
			if ($row = mysqli_fetch_assoc($result)) {

				// Sinced the passwored that was stored in the db was hashed, to verify if the user has enterd a correct password,
				// the password they entered gets hashed and then the hash code is then checked against the has code stored in the db.
				$passwordcheck = password_verify($password, $row['Password']);

				// if the password is incorrect the user is sent back to the page with an error message
				if ($passwordcheck == false) {
					header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/login.php?error=InvalidPassword");
				exit();
				}

				// If the password is correct, ass session variable or global variable is created storing the users username and keeping them logged in.
				else if ( $passwordcheck ==  true) {

					session_start();
					$_SESSION['Username'] = $row['Username'];
					$_SESSION['UserID'] = $row['UserID'];

					// The user is sent to the rent car page 
					header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/rent-car.php?success=yes");
					exit();
					
				}

				// Just incase anything gets passed the first validation check
				else {

					header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/login.php?error=InvalidPassword2");
					exit();
				}
				
			}

			// If the user has entered an incorrect username they will be sent back to the page with an error message
			else {

				header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/login.php?error=InvalidUser");
				exit();

			}
		}

	}





}


else {
	
	header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/login.php");
	exit();
}










?>