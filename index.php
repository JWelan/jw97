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
  <title>CitiRentals | Home</title>

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
    <div id="page-content-wrapper" class="splash">
      <!-- hamburger / navigation toggle -->
      <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
      </button>

      <div class="container">
        <div class="row">
          <div class="col-lg-12">

            <!-- Start of carousel -->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="item active">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-10 col-lg-offset-1">
                        <img src="aston_martin.jpg" class="img-responsive" />
                        <div class="carousel-caption">
                          <h1 class="text-center">
                            About us
                          </h1>
                          <p>
                            CitiRentals is a new up and coming car rental firm based in Edinburgh. We are currently a small firm based out of Edinburgh airport, offering cars at multiple price points. We aim to a service that is straight forward and
                            easy to use, so that when coming to your destination there is no hassle between collection your baggage and you being on your way.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /#Slide 1 -->

                <!-- Slide 2 -->
                <div class="item">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-10 col-lg-offset-1">
                        <img src="maserati.jpg" class="img-responsive" />
                        <div class="carousel-caption">
                          <h1 class="text-center">
                            Future Plans
                          </h1>
                          <p>
                            As stated, we are a small firm based out of Edinburgh Airport, but we do have plans to expand without the UK with our next airport being Glasgow Airport. We also have plans to add new cars into our cycle and add some new
                            services we think customer will like.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Slide 2 -->
              </div>
              <!-- /#Wrapper for slides -->

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
              <!-- /#Left and right controls -->


            </div>
            <!-- End of carousel -->

          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div align="center" class="col-lg-12">
           
          <?php
              if(isset($_SESSION['Username'])) {
          
              }

              else {

                echo '
             <h1 class="jumbotron">
              Please login to rent a vehicle
            </h1>  
            <div class="col-lg-4 col-lg-offset-2">
              <a href="login.php" class="btn btn-car">
                Login
              </a>
            </div>

            <div class="col-lg-4">
              <a href="register.php" class="btn btn-car">
                Register
              </a>
            </div>
          
              ';
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