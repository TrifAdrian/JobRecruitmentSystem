<!--
=========================================================
* Material Kit 2 - v3.0.0
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit 
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<?php include('./pages/server.php') ?>
<!DOCTYPE HTML>
<?php
   
if (!isset($_SESSION['email'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    header('location: ./pages/sign-in.php'); 
} 

// Logout button will destroy the session, and 
// will unset the session variables 
// User will be headed to 'login.php' 
// after loggin out 
if (isset($_GET['logout'])) { 
    session_destroy(); 
    unset($_SESSION['email']); 
    include("./pages/sign-in.php");
} 
?> 

<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="./assets/img/favicon.png">

<title>
  
  Job Recruitment System
  
</title>



<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
<link rel="stylesheet" href="css.css">
<!-- Nucleo Icons -->
<link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<!-- CSS Files -->



<link id="pagestyle" href="./assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />



</head>

<body class="index-page bg-gray-200">
  
  
  <!-- Navbar -->
  <div class="container position-sticky z-index-sticky top-0"><div class="row"><div class="col-12">
<nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
  <div class="container-fluid px-0">
    <a class="navbar-brand font-weight-bolder ms-sm-3" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
      Job Recruitment System
    </a>
    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
      <ul class="navbar-nav navbar-nav-hover ms-auto">
        <li class="nav-item dropdown dropdown-hover mx-2">
          <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="material-icons opacity-6 me-2 text-md">dashboard</i>
            Pages
            <img src="./assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
          </a>
          <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages">
            <div class="d-none d-lg-block">
  <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
    Landing Pages
  </h6>
  <a href="./pages/aplicari.html" class="dropdown-item border-radius-md">
    <span>Aplicari</span>
  </a>
</div>
          </div>
        </li>
        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
          <ul class="navbar-nav navbar-nav-hover ms-auto">
            <li class="nav-item dropdown dropdown-hover mx-2">
              <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-icons opacity-6 me-2 text-md">dashboard</i>
                <?php echo $_SESSION['email']; ?>
                <img src="./assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
              </a>
              <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages">
                <div class="d-none d-lg-block">
      <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1 mt-3">
        Account
      </h6>
      <a href="index.php?logout='1'" class="dropdown-item border-radius-md">
        <span>Log out</span>
      </a>
    </div>
              </div>
            </li>
  </div>
</div>
</nav>
<!-- End Navbar -->
</div></div></div>



<header class="header-2">
  <div class="page-header min-vh-75 relative" style="background-image: url('./assets/img/bg2.jpg')">
    <span class="mask opacity-4"></span>
    <div class="container">
      <div class="row">
        <div class="col-lg-7 text-center mx-auto">
          <h1 class="text-white pt-3 mt-n5">Job Recruitment System</h1>
          <p class="lead text-white mt-3">Ceva text ******** </p>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">

          <!-- Nav Tabs -->


<!-- -------- START Content Presentation Docs ------- -->
<div class="container mt-sm-5">
  <div class="page-header py-6 py-md-5 my-sm-3 mb-3 border-radius-xl" style="background-image: url('https://image.freepik.com/free-vector/blue-smooth-flowing-dynamic-wave-background_1017-33405.jpg');" loading="lazy">
    <span class="mask bg-gradient-dark"></span>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 ms-lg-5">
        <h1 class="text-white">Razvan Roman</h1>
        <br><br>
        <form method="post" action="modificastatus.php" class="text-start">
              <?php include('errors.php'); ?>
              <div class="progress2">
                <div class="progress-track2"></div>
                <div id="stepp1" name="stepp1" value="stepp1"class="progress-step2">
                  Aplicare
                </div>
                <div id="stepp2" name="stepp2" value="stepp2" class="progress-step2">
                  Interviu
                </div>
                <div id="stepp3" name="stepp3" value="stepp3" class="progress-step2">
                  Oferta
                </div>
                <div id="stepp4" name="stepp4" value="stepp4" class="progress-step2" >
                  Angajare
                </div>
              </div>
              <br>
            <br>
  <button type="button" class="btn btn-secondary btn-sm me-1 mb-0" style="float: right" onClick=next()>Next Step</button>
  <br><br>
  <a type="submit" value="Register" name="reg_status" id="reg_status" class="text-white icon-move-right">
            Modifica Status
            <i class="fas fa-arrow-right text-sm ms-1"></i>
          </a>
</div>
</form>
<script src="javascript.js"></script>
      </div>
  </div>
</div>
</div>
<!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->

<footer class="footer pt-5 mt-5">
  <div class="container">
    <div class=" row">
      <div class="col-12">
        <div class="text-center">
          <p class="text-dark my-4 text-sm font-weight-normal">
            Proiect realizat de Adrian Trif, Darius Marginean si Razvan Roman.
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>

<!--   Core JS Files   -->
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>

<!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
<script src="./assets/js/plugins/countup.min.js"></script>

<script src="./assets/js/plugins/choices.min.js"></script>

<script src="./assets/js/plugins/prism.min.js"></script>
<script src="./assets/js/plugins/highlight.min.js"></script>

<!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
<script src="./assets/js/plugins/rellax.min.js"></script>
<!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
<script src="./assets/js/plugins/tilt.min.js"></script>
<!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
<script src="./assets/js/plugins/choices.min.js"></script>


<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="./assets/js/plugins/parallax.min.js"></script>

<script type="text/javascript">

  if (document.getElementById('state1')) {
    const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
    if (!countUp.error) {
      countUp.start();
    } else {
      console.error(countUp.error);
    }
  }
  if (document.getElementById('state2')) {
    const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
    if (!countUp1.error) {
      countUp1.start();
    } else {
      console.error(countUp1.error);
    }
  }
  if (document.getElementById('state3')) {
    const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
    if (!countUp2.error) {
      countUp2.start();
    } else {
      console.error(countUp2.error);
    };
  }
</script>


<!--   Core JS Files   -->
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>




<!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
<script src="./assets/js/plugins/countup.min.js"></script>





<script src="./assets/js/plugins/choices.min.js"></script>



<script src="./assets/js/plugins/prism.min.js"></script>
<script src="./assets/js/plugins/highlight.min.js"></script>



<!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
<script src="./assets/js/plugins/rellax.min.js"></script>
<!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
<script src="./assets/js/plugins/tilt.min.js"></script>
<!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
<script src="./assets/js/plugins/choices.min.js"></script>


<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="./assets/js/plugins/parallax.min.js"></script>











<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
<script src="./assets/js/material-kit.min.js?v=3.0.0" type="text/javascript"></script>


<script type="text/javascript">

  if (document.getElementById('state1')) {
    const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
    if (!countUp.error) {
      countUp.start();
    } else {
      console.error(countUp.error);
    }
  }
  if (document.getElementById('state2')) {
    const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
    if (!countUp1.error) {
      countUp1.start();
    } else {
      console.error(countUp1.error);
    }
  }
  if (document.getElementById('state3')) {
    const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
    if (!countUp2.error) {
      countUp2.start();
    } else {
      console.error(countUp2.error);
    };
  }
</script>



























</body>

</html>
