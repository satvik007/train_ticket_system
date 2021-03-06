<?php
	session_start();
	if (!array_key_exists('username' , $_SESSION) || !isset($_SESSION['username'])) {
        // if user has not logged in
        header("Location: /train_ticket_system/");
    }
?>

<!DOCTYPE html>
<html>
<title>Train System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css?family=Chelsea+Market|Fredoka+One" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: 'Chelsea Market', cursive;}
    .chal-desc{
        font-size:14px;
    }
    @media (min-width: 768px){
     .container{
        max-width:90%;
        }  
    }
    @media (min-width: 992px){
        .container{
            max-width:90%;
        }
    }
   
    .modal-padding{
        padding:16px;
    }
    .card-body{
        padding-top: 35px;
        padding-bottom: 35px;
    }
    p.card-text{
        font-size: larger;
    }
   
    .navigation .navbar-nav li a{
        color: white !important;
    }
    .title , .category,  .points {
        color : white;
    }
    .currentLink {
        color: red;
        /* background-color: #000000; */
    }
    body{
        color: white;
        background:linear-gradient(to right, rgb(29, 151, 108), rgb(147, 249, 185));
    }
    .navbar{
        background: linear-gradient(30deg, rgb(0, 0, 0), rgb(67, 67, 67));
    }
    .image-container {
      display: flex;
      justify-content: center;  
    }
    #footer {
      position:absolute;
      bottom:0;
      width:100%;
      height:60px;   /* Height of the footer */
      background:#6cf;
    }
</style>
<script>
    $(function(){
        $('#btn-book-ticket').click(function(){
            window.location.replace("../information.php");
        })  ;
    });
</script>

<body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Train System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navigation collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../information.php">Information</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../profile.php">My Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
          </ul>

      
        </div>
      </nav>
    </header>





<!-- !PAGE CONTENT! -->
<div class="container">

<div style="margin-top:60px;"></div>
    

<div align = "center">
    <!-- <strong>HOME</strong> -->
    <br>
    <marquee scrollamount="10" style = "color: red; font-size : 150%"> New train started by Railway minister Himanshu Rai </marquee>
    <h1>
        Get your train ticket here
        <div style = "text-align:center">
        <img src = "../img/train2.jpg" style="width: 50%; height: 50%; padding-top : 10px">
        </div>
        <button id="btn-book-ticket">Book ticket</button>
  </h1>
</div>

<!-- Footer -->
<footer class="page-footer font-small cyan darken-3 fixed-bottom" style="align:bottom;">
    <!-- Footer Elements -->
    <div class="container">
      <!-- Grid row-->
      <div class="row">
        <!-- Grid column -->
        <div class="col-md-12 text-center">
          <div class="mt-5 mb-1">
            <!-- Facebook -->
            <a class="fb-ic">
              <i class="fa fa-facebook fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <!-- Twitter -->
            <a class="tw-ic">
              <i class="fa fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <!-- Google +-->
            <a class="gplus-ic">
              <i class="fa fa-google-plus fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <!--Linkedin -->
            <a class="li-ic">
              <i class="fa fa-linkedin fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <!--Instagram-->
            <a class="ins-ic">
              <i class="fa fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <!--Pinterest-->
            <a class="pin-ic">
              <i class="fa fa-pinterest fa-lg white-text fa-2x"> </i>
            </a>
          </div>
        </div>
        <!-- Grid column -->

      </div>

    <div class="footer-copyright text-center m-2">Made with &hearts; in IIT-PKD</div>
    </div>

  </footer>

</div>


</body>
</html>
