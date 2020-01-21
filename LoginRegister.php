
<?php
	
	// If the Register buttton is pressed..
	if(isset($_POST['Register'])){

		// file to connect to the db
		require('db.php');

		//set all the text box values to variables
		$username = $_POST['Email'];
		$Password = $_POST['Password'];
		$Password2 = $_POST['re-enter_password'];

		// if all the text boxes are empty send the user back to the page with an error message 
		if(empty($username) || empty($Password) || empty($Password2)) {

		header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/register.php?error=emptyfields");
		exit();
		}
		
		// If the user has entered an invalid email send them back to the apge with an error message
		else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
		header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/register.php?error=invalidEmail");
		exit();
		}

		// if the passwords do not match then send the user back to the page with an error message
		else if ($Password !== $Password2) {
		header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/register.php?error=passsnotthesame");
		exit();
		}


		else {
		
		// select query using a prepared statment to prevent SQL injections, The query is to see if the username is already taken
		$sql = "SELECT Username FROM Users WHERE username=?";
		// connection from db file
		$stmt = mysqli_stmt_init($conn);
		
		// if the user has tried to perform an SQL injection they will be sent back to the page with an error message or if the connection  has failed they will be sent back wirth an error message
		if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/register.php?error=sqlerror");
		exit();
		}
			// changes the '?' in the prepared statment to the username and makes sure that the values are suitable to that of a string or "s"
			else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			
			// The results are then stored in a variable named result check
			mysqli_stmt_store_result($stmt);
			$resultcheck = mysqli_stmt_num_rows($stmt);
			
			
			// If the resultcheck brings back anything more than 0, then the username is already taken and the user is sent back to the page with an error message
			if($resultcheck > 0) {
			header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/register.php?error=usernamealreadytaken");
			exit();
			}
				// If the username is unique, then a query to save the username and password to the db is ran, using a prepared statment to prevent from SQL injection
				else {
				$sql = "INSERT INTO Users (Username, Password) VALUES (?, ?)";
				$stmt = mysqli_stmt_init($conn);
				
				// if the user has tried to perform an SQL injection they will be sent back to the page with an error message or if the connection  has failed they will be sent back wirth an error message
				if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/register.php?error=sqlerror");
				exit();
				}	

					else {
					
					// Password is hashed for security reasons before being saved to the db
					$hashedpwd = password_hash($_POST['Password'], PASSWORD_DEFAULT);

					// changes the '? ?' in the prepared statment to the username and password and makes sure that the values are suitable to that of a string or "ss"
					mysqli_stmt_bind_param($stmt, "ss", $username, $hashedpwd);
					
					// the statment is the executed runing the quering and saving the information to the db, the user is then sent to the Login page with a success message
					mysqli_stmt_execute($stmt);
					header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/login.php?success=yes");
					exit();
					}


			}
			}


			}

			// Closing the statment and the SQL connection
			mysqli_stmt_close($stmt);
			mysqli_close($conn);
			}

	// if nothing has been entered taked the user back to the page
	else {
	header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/register.php");
	exit();
	}
?>