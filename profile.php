<?php
    session_start();
    if (!array_key_exists('username' , $_SESSION) || !isset($_SESSION['username'])) {
        // if user has not logged in
        header("Location: /train_ticket_system/signinup.php");
    }

    $img_src = "./img/" . $_SESSION['username'] . "/profile_img.jpg";

    if (!file_exists($img_src)) {
        $img_src = "./img/gates.jpg";
    }

    $img_src = "'" . $img_src . "'";

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    require_once "./utility/dbconnect_user.php";

    $sql = "select * from user where userid='$username'";
    $query_result = $DBcon->query($sql);
    $user_details = $query_result->fetch_array();

    $DBcon->close();
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

<script>
    $(function(){
        $('#btn-my-tickets').click(function(){
            window.location.replace("./user/mytickets.php");
        })  ;

        $('#btn-signout').click(function(){
            $.ajax({
                type	: 'POST',
                url		: 'http://localhost/train_ticket_system/utility/signout.php',
                data	: { },
                success	: function(response){

                    console.log(response);
                    response = JSON.parse(response);
                    if (response['status'] == true) {
                        alert('signout successful');
                        window.location.replace("./signinup.php");
                    }
                }
            });
        });
    });
</script>


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

    #modal-my-tickets {
        color: black;
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
              <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./information.php">Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./information.php">Information</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./profile.php">My Profile</a>
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
    


<div class="container">
    <div class="row">
        <div class="col-sm-6" style = "width: 30%">
            <img src= <?php echo $img_src; ?> alt="avatar" style="max-height: 400px; max-width: 400px">
            <form action="./utility/upload_image.php" method="post" enctype="multipart/form-data">
                <br><br>Select image to upload:<br>
                <input type="file" name="fileToUpload" id="fileToUpload"><br>
                <input type="submit" value="Upload Image" name="submit"><br>
            </form>
        </div>
        <div class="col-sm-6" style = "width = 70%">
        <form action="./utility/change_pass.php" method="post">
            <div class="container">
              <div class="row">
                <div class="col-sm-6" style = "width: 50%; border:2px solid black;">
                  Current Password: <br>
                  New Password: <br>
                  Confirm Password: <br>
                </div>
                <div class="col-sm-6" style = "width: 50%; border:2px solid black;">
                  <input type="text" name="old-password"><br>
                  <input type="text" name="new-password"><br>
                  <input type="text" name="confirm-password"><br>
                </div>
              </div>
            </div>
            &emsp; &emsp; <input type="submit" value="Submit">
        </form> 
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-sm-6" style = "width: 50%; border:2px solid black;">
                    Userid <br>
                    Name <br>
                    Aadhar number <br>
                    Contact number <br>
                </div>
                <div class="col-sm-6" style = "width: 50%; border:2px solid black;">
                    <?php
                        echo $user_details['userid']." <br/>";
                        echo $user_details['name']." <br/>";
                        echo $user_details['aadhar_no']." <br/>";
                        echo $user_details['contact_no']." <br/>";
                    ?>
                </div>
            </div>
        </div>
         
        </div>
    </div>
</div>


    <div align = "center">

        <button id="btn-my-tickets" class="btn btn-lg btn-primary">My tickets</button>
        <button id="btn-signout" class="btn btn-lg btn-primary">Signout</button>

    </div>

<!-- <div>
    <div style="width: 30%; float:left; heigth: 50%;">
        
    </div>
    <div style="width: 70%; height: 50%; background-color: gray; float:right;">-</div>
</div> -->

<!-- Footer -->
<footer class="page-footer font-small cyan darken-3 fixed-bottom" style="z-index:-1 ; align:bottom;">
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