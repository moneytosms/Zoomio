<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING STATUS</title>
</head>
  <link rel="stylesheet" href="css/app.css">
  <?php $cur = basename($_SERVER['PHP_SELF']); ?>
</head>
<body>
<?php
    require_once('connection.php');
    session_start();
    $email = $_SESSION['email'];

    $sql="select * from booking where EMAIL='$email' order by BOOK_ID DESC LIMIT 1";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    if($rows==null){
        echo '<script>alert("THERE ARE NO BOOKING DETAILS")</script>';
        echo '<script> window.location.href = "cardetails.php";</script>';
    }
    else{
    $sql2="select * from users where EMAIL='$email'";
    $name2 = mysqli_query($con,$sql2);
    $rows2=mysqli_fetch_assoc($name2);
    $car_id=$rows['CAR_ID'];
    $sql3="select * from cars where CAR_ID='$car_id'";
    $name3 = mysqli_query($con,$sql3);
    $rows3=mysqli_fetch_assoc($name3);
?>

<div class="site-container">
  <div style="display:flex;gap:12px;align-items:center;justify-content:space-between;margin-bottom:18px">
    <a class="btn btn--ghost" href="cardetails.php">Go to Home</a>
    <div class="name">HELLO! <?php echo $rows2['FNAME']." ".$rows2['LNAME']?></div>
  </div>

  <div class="status-box">
    <div class="content">
      <h1>CAR NAME : <?php echo $rows3['CAR_NAME']?></h1>
      <h2>NO OF DAYS : <?php echo $rows['DURATION']?></h2>
      <h2>BOOKING STATUS : <?php echo $rows['BOOK_STATUS']?></h2>
    </div>
  </div>
</div>

<?php }
?>

</body>
</html>