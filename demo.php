<?php 

 include('config/db.connect.php');

  $name = $email = $phone = $vehicle = $service= $date = '';
  $errors = array('name' => '', 'email' => '', 'phone' => '','vehicle' =>'','time' =>'','service' =>'','date' =>'');

  if(isset($_POST['submit'])){
    
    // check email
    if(empty($_POST['email'])){
      $errors['email'] = 'An email is required';
    } else{
      $email = $_POST['email'];
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Email must be a valid email address';
      }
    }

    // check location
   if(empty($_POST['name'])){
      $errors['name'] = 'A name is required';
    } else{
      $name = $_POST['name'];
        if(!preg_match('/^[0-9a-zA-Z\s]+$/', $name)){
        $errors['name'] = 'name must be letters and spaces only';
      }
    }

    if(empty($_POST['phone'])){
      $errors['phone'] = 'An phone number is required';
    } else{
      $phone = $_POST['phone'];
      if(!preg_match('/^\d{11}$/', $phone)){
        $errors['phone'] = 'Phone number must be numeric and 11 digits only';
      }
    }
    // check destination
    if(empty($_POST['vehicle'])){
      $errors['vehicle'] = 'Vehicle Model is required';
    } else{
      $vehicle = $_POST['vehicle'];
      if(!preg_match('/^[0-9a-zA-Z\s]+$/', $vehicle)){
        $errors['vehicle'] = 'vehicle must be a comma seprated list and either numeric,alphabets or alphanumeric';
      }
    }
    
    // check time_of_travel
    if(empty($_POST['service'])){
      $errors['service'] = 'service is required';
    } else{
      $service = $_POST['service'];
      if(!preg_match('/^[0-9a-zA-Z\s]+$/', $service)){
        $errors['service'] = 'service must be a comma seprated list and either numeric,alphabets or alphanumeric';
      }
    }


    if(empty($_POST['date'])){
      $errors['date'] = 'A date of service is required';
    } else{
      $date = $_POST['date'];
        if(!preg_match('/^[a-zA-Z0-9,.!?\s]*$/', $date)){
        $errors['date'] = 'date of birth must be alphanumeric only';
      }
    }

    if(empty($_POST['time'])){
      $errors['time'] = 'time is required';
    } else{
      $time = $_POST['time'];
        if(!preg_match('/^[a-zA-Z0-9,.!?\s]*$/', $time)){
        $errors['time'] = 'time must be letters and spaces only';
      }
    }

    if(array_filter($errors)){
      echo '<h4 style="color:red;"><em>Error in the form</em></h4>';
    }else{
            
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
             $vehicle = mysqli_real_escape_string($conn, $_POST['vehicle']);
             $service = mysqli_real_escape_string($conn, $_POST['service']);
             $date = mysqli_real_escape_string($conn, $_POST['date']);
             $time = mysqli_real_escape_string($conn, $_POST['time']);

            //create sql
            $sql = "INSERT INTO defem(email,name,phone,vehicle,service,date,time) VALUES('$email','$name','$phone','$vehicle','$service','$date','$time')";

            //save to db and check;
             if(mysqli_query($conn, $sql)){
              echo "<h4 style=color:blue;>Booking successful, we will get back to you soon</h4>";
              //header('Location: index.php');

            }else {

              //error
              echo 'query error:' . mysqli_error($conn);
            }

            
    
    }

  } // end POST check

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>Defem Autocare</title>
   <style>
    header{
      background: url(img/defem4.jpg);
      background-size: cover;
      background-position: center;
      min-height: 60px;

    }
    .section{
      padding-top: 4vw;
      padding-bottom: 4vw;
    }
    @media screen and (max-width: 670px){
      header{
        min-height: 500px;
      }
    }
    .brand-logo{
     height: 30px;
     width: 30px;
    }
    ul li a:hover{
      background-color: black;
    }
   .defem{
      margin-left: -20px;
    }
    .defem1{
      margin-left: -20px;
    }
    .con{
      background-color: red;
      width: 10px;

    }
  </style>
</head>
<body>
<header>
    <nav class="nav-wrapper transparent z-depth-0">
      <div class="container">
        <a href="#" class="brand-logo"><img src="img/logo2.jpg"></a>
        <a href="#" class="sidenav-trigger" data-target="mobile-menu">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li><a href="index.php" style="color: white; font-family:sans-serif;"><b>HOME</b></a></li>
          <li><a href="service.php" style="color: white; font-family: sans-serif;"><b>SERVICE</b></a></li>
          <li><a href="career.php" style="color: white; font-family: sans-serif;"><b>CAREER</b></a></li>
          <li><a href="#" class="tooltipped btn-floating btn-small indigo darken-4" data-tooltip="Instagram">
            <i class="fab fa-instagram"></i>
          </a></li>
          <li><a href="#" class="tooltipped btn-floating btn-small indigo darken-4" data-tooltip="Facebook">
            <i class="fab fa-facebook"></i>
          </a></li>
          <li><a href="#" class="tooltipped btn-floating btn-small indigo darken-4"data-tooltip="Twitter">
            <i class="fab fa-twitter"></i>
          </a></li>
          <li><a href="#" class="tooltipped btn-floating btn-small indigo darken-4"data-tooltip="snapchat">
            <i class="fab fa-snapchat"></i>
          </a></li>
          

        </ul>
        <ul class="sidenav white lighten-2" id="mobile-menu" style="max-height: 900px; border-radius: 5px; font-family: sans-serif;">
          <a href="#" class="brand-logo" style="margin-left:-40px;"><img src="img/logo2.jpg"></a>
          <li style="margin-top: 100px;"><a href="index.php">HOME</a></li>
          <li><a href="service.php">SERVICE</a></li>
          <li><a href="#">CAREER</a></li>
        </ul>
      </div>
    </nav>
    
  </header>


 <div class="container z-depth-2 section">  
    <div class="row">
      <div class="m6 l8 col push-l4 push-m4 s9 push-s2">
        <h3 style="font-family: sans-serif;">BOOK A DEMO</h3>
      </div>
    </div>
  </div>

<form class="white" action="demo.php" method="POST">
<div class="container section" style="background-color:white">
    <div class="row">
      <div class="col l7 m6 push-m3 push-l3 s8 push-s2">
        <h6 style="font-family: sans-serif;">Name</h6>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>
      </div>
    </div> 
  

    <div class="row">
      <div class="col l7 m6 push-m3 push-l3 s8
       push-s2">
        <h6 style="font-family: sans-serif;">Email</h6>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>
      </div>
    </div>
      


    <div class="row">
      <div class="col l7 m6 push-m3 push-l3 s8 push-s2">
        <h6 style="font-family: sans-serif;">Phone Number</h6>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($phone) ?>">
         <div class="red-text"><?php echo $errors['phone']; ?></div>
      </div>
    </div>

     
    <div class="row">
      <div class="col l7 m6 push-m3 push-l3 s8 push-s2">
        <h6 style="font-family: sans-serif;">Vehicle Model</h6>
        <input type="text" name="vehicle" value="<?php echo htmlspecialchars($vehicle) ?>">
         <div class="red-text"><?php echo $errors['vehicle']; ?></div>
      </div>
    </div>

    <div class="row">
      <div class="col l7 m6 push-m3 push-l3 s8 push-s2">
        <h6 style="font-family: sans-serif;">Service</h6>
        <input type="text" name="service" value="<?php echo htmlspecialchars($service) ?>">
        <div class="red-text"><?php echo $errors['service']; ?></div>
      </div>
    </div>

    <div class="row">
      <div class="col l7 m6 push-m3 push-l3 push-m4 s8 push-s2">
          <h6 style="font-family: sans-serif;">Service Date</h6>
        <div class="input-field">
          <input type="text" name="date" class="datepicker" value="<?php echo htmlspecialchars($date) ?>">
          <div class="red-text"><?php echo $errors['date']; ?></div>
        </div>
      </div>
    </div>

     <div class="hide-on-small-only">
    <div class="input-field" value="<?php echo htmlspecialchars($time) ?>">
      <div class="red-text center"><?php echo $errors['time']; ?></div>
      <div class="row">
        <div class="col l6 m6 push-m3 push-l3">
          <h6>Time</h6>
          <select name="time">
            <option value="" disabled selected>select</option>
            <option>8am to 10am</option>
            <option>10pm to 12pm</option>
            <option>12pm to 2pm</option>
            <option>2pm to 4pm</option>
          </select>
        </div>
      </div>

    </div>

  </div>

  <div class="hide-on-med-and-up">
    <div class="input-field" value="<?php echo htmlspecialchars($time) ?>">
      <div class="red-text center"><?php echo $errors['time']; ?></div>
      <div class="row">
        <div class="col s8 push-s2">
          <h6>Time</h6>
          <select name="time">
            <option value="" disabled selected>select</option>
            <option>8am to 10am</option>
            <option>10pm to 12pm</option>
            <option>12pm to 2pm</option>
            <option>2pm to 4pm</option>
          </select>
        </div>
      </div>

    </div>

  </div>

<div class="center section">
        <input type="submit" name="submit" value="Submit" class="btn brand black z-depth-0">
      </div>
    </div>

  </form>

<div class="row">
  <div class="col l6 push-l5 s8 push-s3 m6 push-m4">
<p><i>*Please ensure your email address and phone number is correct*</i></p>
</div>
</div>
  <footer class="page-footer section white">
  <div class="container">
    <div class="row">
      <div class="col s12 m6 l4">
        <h5 style="font-family: sans-serif; color: black">CALL US NOW AT</h5>
<p style="color: black;">Lagos Mainland: 08087222226, 014546694</p>
<p style="color: black;">Lagos Island: 08172013438, 08032023943</p>
<p style="color: black;">Ibadan Branch: 0817-2013447</p>
<p style="color: black">Abuja: 08172013444</p>
      </div>
       <div class="col s6 l4 push-m1 m3 push-l3">
        <h5 style="color: black; font-family: sans-serif;">LOCATION</h5>
<p style="color: black;">DEFEM PLAZA</p>
<p style="color: black;">MUSHIN</p>
<p style="'color: black;">33/35, Ogungbaye Street</p>
<p style="color: black;">Off LUTH Road,</p>
<p style="color: black;">Mushin, Lagos.</p>
      </div>

      <div class="col s6 m3 push-m1 l4 push-l2" style="margin-top: 45px;">   
<p style="color: black;">IBADAN</p>
<p style="color: black;">13, Odubiyi Street,</p>
<p style="color: black;">Back of Anwarul Islam</p>
 <p style="color: black;">Secondary School,</p>
<p style="color: black;">Eleyele, Ibadan,</p>
<p style="color: black;">Oyo State, Nigeria.</p>
      </div>

    </div>
    <div class="footer-copyright black z-depth-4">
    <div class="container center-align"><p style="color: white;">Defam Autocare @2021-All Rights Reserved designed by Axespire Software</p></div>
  </div>
  </div>
</footer>


    <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

  <script>
    $(document).ready(function(){

      $('.sidenav').sidenav();
      $('.materialboxed').materialbox();
      $('.parallax').parallax();
      $('.tabs').tabs();
      $('.datepicker').datepicker({
        disableWeekends: true
      })
      $('.tooltipped').tooltip();
      $('.scrollspy').scrollSpy();
       $('.slider').slider();
       $('select').formSelect();
    });
  </script>





</body>