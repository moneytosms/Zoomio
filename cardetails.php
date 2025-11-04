<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Details</title>
  <link rel="stylesheet" href="css/app.css">
</head>

<body class="body">
<?php 
    require_once('connection.php');
    session_start();

    $value = $_SESSION['email'];
    $_SESSION['email'] = $value;
    
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    $sql2="select *from cars where AVAILABLE='Y'";
    $cars= mysqli_query($con,$sql2);
?>

<div class="site-container">
  <header class="navbar">
  <div class="logo">Zoomio</div>
  <?php $cur = basename($_SERVER['PHP_SELF']); ?>
    <nav class="menu">
      <ul>
        <li><a href="cardetails.php" class="<?php echo ($cur=='cardetails.php')?'active':''; ?>">HOME</a></li>
        <li><a href="aboutus.html" class="<?php echo ($cur=='aboutus.html')?'active':''; ?>">ABOUT</a></li>
        <li><a href="contactus.html" class="<?php echo ($cur=='contactus.html')?'active':''; ?>">CONTACT</a></li>
        <li><a href="feedback/Feedbacks.php" class="<?php echo ($cur=='Feedbacks.php')?'active':''; ?>">FEEDBACK</a></li>
        <li><a class="btn btn--ghost" href="index.php">LOGOUT</a></li>
        <li><img src="images/profile.png" class="circle" alt="profile"></li>
        <li><p class="phello">HELLO! &nbsp;<span id="pname"><?php echo $rows['FNAME']." ".$rows['LNAME']?></span></p></li>
        <li><a href="bookinstatus.php" class="<?php echo ($cur=='bookinstatus.php')?'active':''; ?>">BOOKING STATUS</a></li>
      </ul>
    </nav>
  </header>

  <h1 class="overview">OUR CARS OVERVIEW</h1>
  <div class="de">
  <?php while($result = mysqli_fetch_array($cars)) { $res = $result['CAR_ID']; ?>
    <div class="box">
      <div class="imgBx"><img src="images/<?php echo $result['CAR_IMG']?>" alt="<?php echo $result['CAR_NAME']?>"></div>
      <div class="content">
        <h1><?php echo $result['CAR_NAME']?></h1>
        <h2>Fuel Type: <?php echo $result['FUEL_TYPE']?></h2>
        <h2>Capacity: <?php echo $result['CAPACITY']?></h2>
        <h2>Rent Per Day: ₹<?php echo $result['PRICE']?>/-</h2>
        <a class="btn btn--accent" href="booking.php?id=<?php echo $res;?>">Book</a>
      </div>
    </div>
  <?php } ?>
  </div>
</div>

</body>
</html>