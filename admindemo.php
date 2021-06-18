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
  <h4>SERVICES</h4>
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
      <p> <a href="admindemo.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>


<button><a href="adminqwerty.php">career</a></button>
<?php 

  include('config/db.connect.php');

  // write query for all pizzas
  $sql = 'SELECT name, time, date, vehicle, email, phone, service, id, created_at FROM defem ORDER BY created_at';

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

  include('config/db.connect.php');

  if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM defem WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
      header('Location: admindemo.php');
    } else {
      echo 'query error: '. mysqli_error($conn);
    }

  }

  // check GET request id param
  if(isset($_GET['id'])){
    
    // escape sql chars
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql
    $sql = "SELECT * FROM defem WHERE id = $id";

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
  <h4 class="center grey-text">Submitted Appointments</h4>
</div>
</div>

  <div class="container">
    <div class="row">

      <?php foreach($app as $a): ?>

        <div class="col s12 m6 l6">
          <div class="card z-depth-2">
            <div class="card-content center">
              <h5>User ID: <?php echo htmlspecialchars($a['id']); ?></h5>
              <h5>Full Name: <?php echo htmlspecialchars($a['name']); ?></h5>
              <h5>Email: <?php echo htmlspecialchars($a['email']); ?></h5>
              <h5>Vehicle Model: <?php echo htmlspecialchars($a['vehicle']); ?></h5>
              <h5>Phone number: <?php echo htmlspecialchars($a['phone']); ?></h5>
              <h5>Service: <?php echo htmlspecialchars($a['service']); ?></h5>
              <h5>Date: <?php echo htmlspecialchars($a['date']); ?></h5>
              <h5>Time: <?php echo htmlspecialchars($a['time']); ?></h5> 
              <em><p style="color: red;">Time of booking: <?php echo htmlspecialchars($a['created_at']); ?></p></em>        
            </div>
        <!-- DELETE FORM -->
        <form action="admindemo.php" method="POST">
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