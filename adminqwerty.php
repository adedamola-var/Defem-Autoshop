<?php include('header.php'); ?>
<?php include('config/server.php'); ?>

<?php  

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>


<body>

<div class="header"> 
  <h2>Admin Page</h2>
  <h4>CAREER</h4>
</div>
<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
      <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <p> <a href="adminqwerty.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

<a href="admindemo.php"><i class="material-icons">forward_arrow</i></a>
<?php 

  include('config/db.connect_career.php');

  // write query for all pizzas
  $sql = 'SELECT name, gender, date_of_birth, age, state_of_origin, email, phone_number, school, soft_skill, address, starting_date, ending_date, id FROM defem_career ORDER BY created_at';

  // get the result set (set of rows)
  $result = mysqli_query($conn, $sql);

  // fetch the resulting rows as an array
  $app = mysqli_fetch_all($result, MYSQLI_ASSOC); 

  // free the $result from memory (good practise)
  mysqli_free_result($result);

  // close connection
  mysqli_close($conn);


?>


<?php 

  include('config/db.connect_career.php');

  if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM defem_career WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
      header('Location: adminqwerty.php');
    } else {
      echo 'query error: '. mysqli_error($conn);
    }

  }

  // check GET request id param
  if(isset($_GET['id'])){
    
    // escape sql chars
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql
    $sql = "SELECT * FROM defem_career WHERE id = $id";

    // get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $trans = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

  }

?>


<!DOCTYPE html>
<html>
  
    <div class="row">
      <div class="col push-s2 push-l5">
  <h4 class="center grey-text">Submitted Applications</h4>
</div>
</div>

  <div class="container">
    <div class="row">

      <?php foreach($app as $a): ?>

        <div class="col s12 m6 l6">
          <div class="card z-depth-2">
            <div class="card-content center">
              <h6>User ID: <?php echo htmlspecialchars($a['id']); ?></h6>
              <h6>Fullname: <?php echo htmlspecialchars($a['name']); ?></h6>
              <h6>Gender: <?php echo htmlspecialchars($a['gender']); ?></h6>
              <h6>Date of birth: <?php echo htmlspecialchars($a['date_of_birth']); ?></h6>
              <h6>Age: <?php echo htmlspecialchars($a['age']); ?></h6>
              <h6>State of origin: <?php echo htmlspecialchars($a['state_of_origin']); ?></h6>
              <h6>Email: <?php echo htmlspecialchars($a['email']); ?></h6>
              <h6>Phone number: <?php echo htmlspecialchars($a['phone_number']); ?></h6>
              <h6>School: <?php echo htmlspecialchars($a['school']); ?></h6>
              <h6>Soft Skill: <?php echo htmlspecialchars($a['soft_skill']); ?></h6>
              <h6>House address: <?php echo htmlspecialchars($a['address']); ?></h6>
              <h6>Starting Date: <?php echo htmlspecialchars($a['starting_date']); ?></h6>
              <h6>Ending Date: <?php echo htmlspecialchars($a['ending_date']); ?></h6>
              
            </div>
        <!-- DELETE FORM -->
        <form action="adminqwerty.php" method="POST">
        <div class="row">
        <div class="col push-s5 push-l5">
        <input type="hidden" name="id_to_delete" value="<?php echo $a['id']; ?>">
        <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0 red">
      </div>
    </div>
      </form>

          </div>
        </div>

      <?php endforeach; ?>

    </div>
  </div>

  

</html>















    
</body>