<?php 
  
  session_start();

?>  

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags set html standards -->
  <link rel="icon" href="../../favicon.ico">
  <!-- Above is the site icon for a tab -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <!-- Above is a external reference to Boostrap and the website own stylesheet -->
  <title>CitiRentals | Search</title>

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">


</head>

<!-- Site logo -->
<header>
  <div align="center">
    <img src="logo.png" class="logo" />
  </div>

  <div align="center">
    
    <?php 

      //displays the useres username
      if (isset($_SESSION['Username'])) {
        echo '
          
          <p style="color:white;"> Logged In || Username: '.$_SESSION['Username'].' </p>
        ';
      }


     ?>
  </div>
</header>

<body>

  <!-- wrapper& overlay are part of the sidebar navigation -->
  <div id="wrapper">
    <div class="overlay"></div>

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
      <ul class="nav sidebar-nav">
        <li class="sidebar-brand">
          <img src="logo.png" class="side-logo" />
        </li>
        <li>
          <a href="index.php">Home</a>
        </li>
        <li>
          <a href="all-cars.php">All Cars</a>
        </li>
        <li>
          <a href="locations.php">All Locations</a>
        </li>
        
       

        <?php

          // If the user is logged in, it will display their Username,
          // a link to thier account page and a link to logout
          // 
          // If the user is not logged in it will display a link to the 
          // Login page and a link to the register page, Theese will not be 
          // shown if the user is logged in
          
          if(isset($_SESSION['Username'])) {
            
            echo '
            
            <li>
              <a href="account.php">My Account</a>
            </li>

            <li>
              <a href="logout.php">Logout</a>
            </li>

            <li>
              <a href="rent-car.php">Rent Car</a>
            </li>
            ';
            
          }
          else {
            echo '
            <li>
              <a href="login.php">Login</a>
            </li>
            
            <li>
              <a href="register.php">Register</a>
            </li>
            ';
          }
        ?>
       
                
      </ul>
    </nav>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <!-- hamburger / navigation toggle -->
      <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
      </button>


      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1>Results</h1>

            <?php

            require'db.php'; 

                
                // if all the relevant information for the form has been entered and passed into the URL then proceed
                if ( isset($_GET['Location']) and isset($_GET['Age']) and isset($_GET['StartDate']) and isset($_GET['EndDate'] )) {

                  /*echo'<h1>Proof:</h1><br>
                  <h1>'.$_GET['Location'].'</h1><br>
                  <h1>'.$_GET['Age'].'</h1><br>
                  <h1>'.$_GET['StartDate'].'</h1><br>
                  <h1>'.$_GET['EndDate'].'</h1><br>

                  ';*/

                  // Create SQL statment using a prepared statment
                  $sql = 'SELECT * FROM Cars WHERE Location=? AND AgeRequirement <=? AND Rented=0';
                  $stmt = mysqli_stmt_init($conn);
                  $location = $_GET['Location'];
                  $age = $_GET['Age'];
                  
                  // if the user has tried to perform an SQL injection they will be sent back to the page with an error message or if 
                  // the connection  has failed they will be sent back wirth an error message
                  if (!mysqli_stmt_prepare($stmt, $sql)) {
                  header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/rent-car.php?error=sqlerror");
                  exit();
                  }

                  else{

                    // changes the '?' in the prepared statment to the username and makes sure that the values are suitable 
                    // to that of a string or "s" and interger or "i"
                    mysqli_stmt_bind_param($stmt, "si", $location, $age);
                    mysqli_stmt_execute($stmt);

                    // Stores the result in a variable
                    $result = mysqli_stmt_get_result($stmt);

                    // while there is data to fetch, create a table row with data from the SQL db populating the table row
                    // as follows
                    // 
                    // If the button is clicked on the page to rent a car, it will take some of the details about the car
                    // to the next page bia the url for queriying purposes on the next page
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '
                    <!-- /car -->
                    <div class="row car-row">
                      <div align="center" class="col-lg-4">
                        <img class="car" src="'.$row['Photoname'].'">
                      </div>
                      <div align="center" class="col-lg-6">
                        <p class="text-left car-info">
                          <strong>Model: </strong> <i>'.$row['Model'].'</i><br>
                          <strong>Seats: </strong><i>'.$row['Seats'].'</i><br>
                          <strong>Doors: </strong><i>'.$row['Doors'].'</i><br>
                          <strong>Transmission: </strong><i>'.$row['Transmission'].'</i><br>
                          <strong>Minimum Age Required: </strong><i>'.$row['AgeRequirement'].' Years</i><br>
                          <strong>Price: </strong><i>£'.$row['Price'].' per Day</i>
                          <br><strong>Location: </strong></strong><i>'.$row['Location'].'</i>
                        </p>
                      </div>
                      <!-- Rent car btn -->
                      <div class="col-lg-2">
                        <div class="align-middle">
                          <a class="btn btn-rent" name="Rent" id="Rent" href="rental-success.php?success=yes&Photoname='.$row['Photoname'].'&Seats='.$row['Seats'].'&Doors='.$row['Doors'].'&Transmission='.$row['Transmission'].'&AgeRequirement='.$row['AgeRequirement'].'&Price='.$row['Price'].'&Model='.$row['Model'].'&StartDate='.$_GET['StartDate'].'&EndDate='.$_GET['EndDate'].'&Location='.$row['Location'].'&CarID='.$row['CarID'].'">
                            Rent car
                          </a>
                        </div>
                      </div>
                      <!-- /#Rent car btn -->
                    </div>
                    <!-- /car -->
                    ';
                      
                    }

                    
                  }
                  
                }

                else{
                  header("Location: http://www2.macs.hw.ac.uk/~jw97/CitiRentals/rent-car.php?error=EnterAllValues");
                  exit();
                }

            ?>

          </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="../../dist/js/bootstrap.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

  <!-- The script below toggles the side navigation when the hamburger is clicked-->
  <script>
    $(document).ready(function() {
      var trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = false;

      trigger.click(function() {
        hamburger_cross();
      });

      function hamburger_cross() {

        if (isClosed == true) {
          overlay.hide();
          trigger.removeClass('is-open');
          trigger.addClass('is-closed');
          isClosed = false;
        } else {
          overlay.show();
          trigger.removeClass('is-closed');
          trigger.addClass('is-open');
          isClosed = true;
        }
      }

      $('[data-toggle="offcanvas"]').click(function() {
        $('#wrapper').toggleClass('toggled');
      });
    });
  </script>

</body>

</html>