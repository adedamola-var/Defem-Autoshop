<?php 

 include('config/db.connect_career.php');

  $name = $date_of_birth = $age = $state_of_origin = $email = $school = $phone_number = $address = $soft_skill = $starting_date = $ending_date = $gender ='';
  $errors = array('name' => '', 'date_of_birth' => '', 'age' => '','state_of_origin' =>'','email' =>'','school' =>'','phone_number' =>'','address' =>'','soft_skill' =>'','starting_date' =>'','ending_date' =>'','gender' =>'');

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

    
    // check destination
    if(empty($_POST['date_of_birth'])){
      $errors['date_of_birth'] = 'A date of birth is required';
    } else{
      $date_of_birth = $_POST['date_of_birth'];
        if(!preg_match('/^[a-zA-Z0-9,.!?\s]*$/', $date_of_birth)){
        $errors['date_of_birth'] = 'date of birth must be alphanumeric only';
      }
    }

    // check age
    if(empty($_POST['age'])){
      $errors['age'] = 'An age is required';
    } else{
      $age = $_POST['age'];
        if(!preg_match('/^[0-9a-zA-Z\s]+$/', $age)){
        $errors['age'] = 'age must be letters and spaces only';
      }
    }

    // check state of origin
    if(empty($_POST['state_of_origin'])){
      $errors['state_of_origin'] = 'A state of origin is required';
    } else{
      $state_of_origin = $_POST['state_of_origin'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $state_of_origin)){
        $errors['state_of_origin'] = 'state must be letters and spaces only';
      }
    }

   // check phone number
    if(empty($_POST['phone_number'])){
      $errors['phone_number'] = 'An phone number is required';
    } else{
      $phone_number = $_POST['phone_number'];
      if(!preg_match('/^\d{11}$/', $phone_number)){
        $errors['phone_number'] = 'Phone number must be numeric and 11 digits only';
      }
    }

  // check house address
    if(empty($_POST['address'])){
      $errors['address'] = 'house address is required';
    } else{
      $address = $_POST['address'];
      if(!preg_match('/^[0-9a-zA-Z\s]+$/', $address)){
        $errors['address'] = 'address must be letters and spaces only';
      }
    }    

    if(empty($_POST['gender'])){
      $errors['gender'] = 'A gender is required';
    } else{
      $gender = $_POST['gender'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $gender)){
        $errors['gender'] = 'gender must be letters and spaces only';
      }
    }

     // check destination
    if(empty($_POST['school'])){
      $errors['school'] = 'School is required';
    } else{
      $school = $_POST['school'];
      if(!preg_match('/^[0-9a-zA-Z\s]+$/', $school)){
        $errors['school'] = 'school must be a comma seprated list and either numeric,alphabets or alphanumeric';
      }
    }

   if(empty($_POST['starting_date'])){
      $errors['starting_date'] = 'A date of service is required';
    } else{
      $starting_date = $_POST['starting_date'];
        if(!preg_match('/^[a-zA-Z0-9,.!?\s]*$/', $starting_date)){
        $errors['starting_date'] = 'starting date of birth must be alphanumeric only';
      }
    }

    if(empty($_POST['ending_date'])){
      $errors['ending_date'] = 'A ending date of service is required';
    } else{
      $ending_date = $_POST['ending_date'];
        if(!preg_match('/^[a-zA-Z0-9,.!?\s]*$/', $ending_date)){
        $errors['ending_date'] = 'date of birth must be alphanumeric only';
      }
    }

    if(empty($_POST['soft_skill'])){
      $errors['soft_skill'] = 'A skill is required';
    } else{
      $soft_skill = $_POST['soft_skill'];
        if(!preg_match('/^[a-zA-Z0-9,.!?\s]*$/', $soft_skill)){
        $errors['soft_skill'] = 'Skill of birth must be alphanumeric only';
      }
    }
    
    if(array_filter($errors)){
      echo '<h4 style="color:red;"><em>Error in the form</em></h4>';
    }else{
            
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
             $gender = mysqli_real_escape_string($conn, $_POST['gender']);
             $age = mysqli_real_escape_string($conn, $_POST['age']);
             $school = mysqli_real_escape_string($conn, $_POST['school']);
             $state_of_origin = mysqli_real_escape_string($conn, $_POST['state_of_origin']);
             $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
             $address = mysqli_real_escape_string($conn, $_POST['address']);
             $starting_date = mysqli_real_escape_string($conn, $_POST['starting_date']);
             $ending_date = mysqli_real_escape_string($conn, $_POST['ending_date']);
             $soft_skill = mysqli_real_escape_string($conn, $_POST['soft_skill']);

            //create sql
            $sql = "INSERT INTO defem_career(email,name,date_of_birth,phone_number,state_of_origin,gender,age,soft_skill,address,school,starting_date,ending_date) VALUES('$email','$name','$date_of_birth','$phone_number','$state_of_origin','$gender','$age','$soft_skill','$address','$school','$starting_date','$ending_date')";

            //save to db and check;
             if(mysqli_query($conn, $sql)){
              echo "<h4 style=color:blue;>Application submitted successfully, we will get back to you soon</h4>";
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
      min-height: 700px;

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
          <li><a href="#" style="color: white; font-family: sans-serif;"><b>CAREER</b></a></li>
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
    <div class="row">
      <div class="col push-l5 l6 m6 s6 push-s3 push-m4 ">
     <h2 style="font-family: sans-serif; color: white; margin-top: 100px;"><b>CAREER</b></h2>
   </div>
 </div>
 <div class="row">
      <div class="col push-l5 s8 push-s3 l6 m6 push-m4">
     <h5 style="font-family: sans-serif; color: white; margin-top: 30px; margin-left: -60px;"><b>The Best Autoworkshop For Your CV</b></h5>
   </div>
 </div>
 <div class="row">
      <div class="col push-l5 l4 S6 push-s3 m5 push-m4">
     <a href="demo.php"><button style="min-height: 60px; max-width: 220px; margin-top: 100px; background-color:white; color: black; font-family: sans-serif; border-radiu: 10px; border-top-width: 0px; margin-left: 20px;" ><b>BOOK APPOINTMENT</b></button></a>
   </div>
 </div>
  </header>


  <div class="container z-depth-2 hide-on-small-only">  
    <div class="row">
      <div class="m6 l8 col push-l3 push-m4">
        <h3 style="font-family: sans-serif;">SUBMIT YOUR APPLICATION</h3>
      </div>
    </div>
  </div>


  <form class="white" action="career.php" method="POST">
  <div class="hide-on-small-only container" style="background-color:white">
    <div class="row">
      <div class="col l7 m6 push-m3 push-l3">
        <h6 style="font-family: sans-serif;">Full Name</h6>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>
      </div>
    </div>  
    
      <div class="input-field">
        <div class="input-field" name="gender" value="<?php echo htmlspecialchars($gender) ?>">
      <div class="red-text"><?php echo $errors['gender']; ?></div>
      <div class="row">
        <div class="col l6 m6 push-m3 push-l3">
          <h6 style="font-family: sans-serif;">Gender</h6>
          <select name="gender">
            <option value="" disabled selected>select</option>
            <option>Male</option>
            <option>Female</option>

          </select>
        </div>
      </div>

    </div>


  <div class="hide-on-small-only section">
    <div class="row">
      <div class="col l6 m6 push-m3 push-l3 push-m4">

        <div class="col push-l1">
          <h6 style="font-family: sans-serif;">Date of birth</h6>
        </div>
        <div class="input-field">
          <input type="text" name="date_of_birth" class="datepicker"  value="<?php echo htmlspecialchars($date_of_birth) ?>">
        <div class="red-text"><?php echo $errors['date_of_birth']; ?></div>
        </div>
      </div>
    </div>
  </div>

  <div class="hide-on-small-only">
    <div class="row">
      <div class="col l4 m6 push-m3 push-l4 age">
        <h6 style="font-family: sans-serif;">Age</h6>
        <input type="text" name="age" value="<?php echo htmlspecialchars($age) ?>">
        <div class="red-text"><?php echo $errors['age']; ?></div>
      </div>
    </div>  
  </div>

  <div class="hide-on-small-only">
    <div class="row">
      <div class="col l4 m6 push-m3 push-l4">
        <h6 style="font-family: sans-serif;">State of origin</h6>
        <input type="text" name="state_of_origin" value="<?php echo htmlspecialchars($state_of_origin) ?>">
        <div class="red-text"><?php echo $errors['state_of_origin']; ?></div>
      </div>
    </div>  
  </div>

  <div class="hide-on-small-only">
    <div class="row">
      <div class="col l4 m6 push-m3 push-l4">
        <h6 style="font-family: sans-serif;">Email</h6>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>
      </div>
    </div>  
  </div>

   <div class="hide-on-small-only">
    <div class="row">
      <div class="col l4 m6 push-m3 push-l4">
        <h6 style="font-family: sans-serif;">School</h6>
        <input type="text" name="school"  value="<?php echo htmlspecialchars($school) ?>">
        <div class="red-text"><?php echo $errors['school']; ?></div>
      </div>
    </div>  
  </div>


  <div class="hide-on-small-only">
    <div class="row">
      <div class="col l4 m6 push-m3 push-l4">
        <h6 style="font-family: sans-serif;">Phone Number</h6>
        <input type="text" name="phone_number"  value="<?php echo htmlspecialchars($phone_number) ?>">
        <div class="red-text"><?php echo $errors['phone_number']; ?></div>
      </div>
    </div>  
  </div>




  

  <div class="hide-on-small-only">
    <div class="row">
      <div class="col l6 m6 push-m3 push-l3">
        <h6 style="font-family: sans-serif;">Full House  Address</h6>
        <input type="text" name="address" value="<?php echo htmlspecialchars($address) ?>">
        <div class="red-text"><?php echo $errors['address']; ?></div>
      </div>
    </div>  
  </div>

  <div class="hide-on-small-only">
    <div class="row">
      <div class="col l6 m6 push-m3 push-l3">
        <h6 style="font-family: sans-serif;">Soft Skills</h6>
        <input type="text" name="soft_skill"  value="<?php echo htmlspecialchars($soft_skill) ?>">
        <div class="red-text"><?php echo $errors['soft_skill']; ?></div>
      </div>
    </div>  
  </div>

      
      <div class="hide-on-small-only">
    <div class="row">
      <div class="col l6 m6 push-m3 push-l3">
        <h6 style="font-family: sans-serif;">Starting Date</h6>
        <input type="text" name="starting_date" class="datepicker" value="<?php echo htmlspecialchars($starting_date) ?>">
        <div class="red-text"><?php echo $errors['starting_date']; ?></div>
      </div>
    </div>  
  </div>

   <div class="hide-on-small-only">
    <div class="row">
      <div class="col l6 m6 push-m3 push-l3">
        <h6 style="font-family: sans-serif;">Ending Date</h6>
        <input type="text" name="ending_date" class="datepicker" value="<?php echo htmlspecialchars($ending_date) ?>">
        <div class="red-text"><?php echo $errors['ending_date']; ?></div>
      </div>
    </div>  
  </div>
 
 <div class="center section hide-on-small-only">
        <input type="submit" name="submit" value="Submit" class="btn brand black z-depth-0">
      </div>
    </div>
 </form>      


  

  <!--<h3>small screen only</h3>-->

  <form class="white" action="app.php" method="POST">

  <div class="hide-on-med-and-up">
    <div class="row">
      <div class="col s8 push-s2">
        <h5>SUBMIT YOUR APPLICATION</h5>
      </div>
    </div>
  </div>
  <div class="hide-on-med-and-up">
    <div class="row">
      <div class="col s6 push-s3">
        <h6 style="font-family: sans-serif;">Full Name</h6>
        <input type="text" name="name">
      </div>
    </div>
  </div>


  <div class="hide-on-med-and-up">
    <div class="input-field" name="gender"></div>
      <div class="row">
        <div class="col s6 push-s3">
          <h6 style="font-family:sans-serif;">Gender</h6>
          <select name="gender">
            <option value="" disabled selected>select</option>
            <option>Male</option>
            <option>Female</option>

          </select>
        </div>
      </div>

    </div>
  </div>


  <div class="hide-on-med-and-up">
    <div class="row">
      <div class="col s6 push-s3">

        <div class="col push-l1">
          <h6 style="font-family: sans-serif;">Date of birth</h6>
        </div>
        <div class="input-field">
          <input type="text" name="date_of_birth" class="datepicker">
        </div>
      </div>
    </div>
  </div>


  <div class="hide-on-med-and-up">
    <div class="row">
      <div class="col s6 push-s3">
        <h6 style="font-family:sans-serif;">Age</h6>
        <input type="text" name="age">
      </div>
    </div>  
  </div>


  <div class="hide-on-med-and-up">
    <div class="row">
      <div class="col s6 push-s3">
        <h6 style="font-family: sans-serif;">State of origin</h6>
        <input type="text" name="state_of_origin">
      </div>
    </div>  
  </div>

  <div class="hide-on-med-and-up">
    <div class="row">
      <div class="col s6 push-s3">
        <h6 style="font-family: sans-serif;">Email</h6>
        <input type="text" name="email">
      </div>
    </div>  
  </div>

 <div class="hide-on-med-and-up">
    <div class="row">
      <div class="col s6 push-s3">
        <h6 style="font-family: sans-serif;">School</h6>
        <input type="text" name="school">
      </div>
    </div>  
  </div>

  <div class="hide-on-med-and-up">
    <div class="row">
      <div class="col s6 push-s3">
        <h6 style="font-family: sans-serif;">Phone Number</h6>
        <input type="text" name="phone_number">
      </div>
    </div>  
  </div>

   

       <div class="hide-on-med-and-up">
    <div class="row">
      <div class="col s6 push-s3">
        <h6 style="font-family: sans-serif;">Full House Address</h6>
        <input type="text" name="address">
      </div>
    </div>  
  </div>

  <div class="hide-on-med-and-up">
    <div class="row">
      <div class="col s6 push-s3">
        <h6>Soft Skills</h6>
        <input type="text" name="skills">
      </div>
    </div>  
  </div>

      
      <div class="hide-on-med-and-up">
    <div class="row">
      <div class="col s6 push-s3">
        <h6>Starting Date</h6>
        <input type="text" name="starting_date">
      </div>
    </div>  
  </div>


    <div class="hide-on-med-and-up">
    <div class="row">
      <div class="col s6 push-s3">
        <h6>Ending Date</h6>
        <input type="text" name="ending_date">
      </div>
    </div>  
  </div>

  
 <div class="center section hide-on-med-and-up">
        <input type="submit" name="submit" value="Submit" class="btn brand black z-depth-0">
      </div>
 </form>      


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