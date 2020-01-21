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
  <title>CitiRentals | Rent</title>

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

      <?php 
          if ($_GET['success'] == "yes") {
              
              echo '<p style="color:green; font-size:20px;">Login Successfull!</p> ';
          }
        
       ?>

      <div class="container">
        <div class="row">
          <h1 style="margin-bottom:4rem;">Rental Form</h1>
        </div>
      </div>

      <!-- Rental form -->
      <div class="container-fluid">
        <div class="row">
          <div align="center" class="col-lg-12">

            <div class="col-lg-6">
              <img class="img-responsive" src="bursting-car.png" />
            </div>

            <div class="col-lg-4">
              <form id="Rental_details" action="carform.php" method="post" class="citirental-form">

                <div id="Login">
                  <p>
                    Select Location:
                  </p>

                  <span class="custom-dropdown big">
                    <select name="Location" required="">
                      <option value="Edinburgh">Edinburgh</option>
                      <option value="Glasgow">Glasgow</option>
                    </select>
                  </span>

                  <p>
                    Age:
                  </p>

                  <input type="number" name="Age" required="">

                  <p>
                    Start Date:
                  </p>

                  <input type="date" name="StartDate" required="">

                  <p>
                    End Date:
                  </p>

                  <input type="date" name="EndDate" required="">
                  
                </div>

                <br>
                <div id="buttonL">

                  <button id="Search" type="submit" name="Search" placeholder="Search">Search</button>

                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Rental form -->

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