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
  <title>CitiRentals | Locations</title>

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
          
          <p style="color:white;  left:50px;"> Logged In || Username: '.$_SESSION['Username'].' </p>
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
            <h1>All locations</h1>

            <div class="row">
              <!-- Google map -->
              <div class="col-lg-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2233.918471094368!2d-3.363641884061757!3d55.95078498060677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4887c50e93e3017d%3A0x19530a2592b1d59b!2sEdinburgh+Airport!5e0!3m2!1sen!2suk!4v1551135607786"
                  width="600" height="450" frameborder="0" class="google-map" style="border:0" allowfullscreen></iframe>
              </div>
              <!-- /#Google map -->

              <div class="col-lg-4 location-info">
                <p>
                  <strong>Location:</strong><i> Edinburgh Airport</i><br>
                  <strong>Postcode:</strong><i> EH12 9DN</i><br>
                </p>

                <p>
                  <strong>Monday:</strong><i> 0800-1800</i>
                </p>

                <p>
                  <strong>Tuesday:</strong><i> 0800-1800</i>
                </p>

                <p>
                  <strong>Wednesday:</strong><i> 0800-1800</i>
                </p>

                <p>
                  <strong>Thursday:</strong><i> 0800-1800</i>
                </p>

                <p>
                  <strong>Friday:</strong><i> 0800-1800</i>
                </p>

                <p>
                  <strong>Saturday:</strong><i> 0900-1700</i>
                </p>

                <p>
                  <strong>Sunday:</strong><i> 1000-1600</i>
                </p>

              </div>
            </div>
            <br>
            <div class="row">
              <!-- Google map -->
              <div class="col-lg-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2238.6304766221892!2d-4.437241583950181!3d55.86907739048545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48884eb90111e0dd%3A0x24a888b519aa330b!2sGlasgow+Airport!5e0!3m2!1sen!2suk!4v1552665003571" width="750" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
              <!-- /#Google map -->

              <div class="col-lg-4 location-info">
                <p>
                  <strong>Location:</strong><i> Glasgow Airport</i><br>
                  <strong>Postcode:</strong><i> PA3 2SW</i><br>
                </p>

                <p>
                  <strong>Monday:</strong><i> 0800-1800</i>
                </p>

                <p>
                  <strong>Tuesday:</strong><i> 0800-1800</i>
                </p>

                <p>
                  <strong>Wednesday:</strong><i> 0800-1800</i>
                </p>

                <p>
                  <strong>Thursday:</strong><i> 0800-1800</i>
                </p>

                <p>
                  <strong>Friday:</strong><i> 0800-1800</i>
                </p>

                <p>
                  <strong>Saturday:</strong><i> 0900-1700</i>
                </p>

                <p>
                  <strong>Sunday:</strong><i> 1000-1600</i>
                </p>

              </div>
            </div>

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