<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
    <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
    <div class="site-container">
<?php

require_once('connection.php');
$query="SELECT *from booking ORDER BY BOOK_ID DESC";    
$queryy=mysqli_query($con,$query);
$num=mysqli_num_rows($queryy);

// current page name for active nav highlighting
$cur = basename($_SERVER['PHP_SELF']);


?>

<div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Zoomio</h2>
            </div>
                                        <div class="menu">
                                <ul>
                                        <li><a href="adminvehicle.php" class="<?php echo ($cur=='adminvehicle.php')?'active':''; ?>">VEHICLE MANAGEMENT</a></li>
                                        <li><a href="adminusers.php" class="<?php echo ($cur=='adminusers.php')?'active':''; ?>">USERS</a></li>
                                        <li><a href="admindash.php" class="<?php echo ($cur=='admindash.php')?'active':''; ?>">FEEDBACKS</a></li>
                    
                                        <li><a href="adminbook.php" class="<?php echo ($cur=='adminbook.php')?'active':''; ?>">BOOKING REQUEST</a></li>
                                    <li> <button class="nn"><a href="index.php">LOGOUT</a></button></li>
                                </ul>
                        </div>
         </div>

         </div>
        <div>
            <h1 class="header">BOOKINGS</h1>
            <div>
                <div>
                    <table class="content-table">
                <thead>
                    <tr>
                        <th>CAR ID</th>
                        <th>EMAIL</th>
                        <th>BOOK PLACE</th>
                        <th>BOOK DATE</th>
                        <th>DURATION</th>
                        <th>PHONE NUMBER</th>
                        <th>DESTINATION</th>
                        <th>RETURN DATE</th>
                        <th>BOOKING STATUS</th>
                        <th>APPROVE</th>
                        <th>CAR RETURNED</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                
                while($res=mysqli_fetch_array($queryy)){
                
                
                ?>
                <tr  class="active-row">
                    
                    <td><?php echo $res['CAR_ID'];?></php></td>
                    <td><?php echo $res['EMAIL'];?></php></td>
                    <td><?php echo $res['BOOK_PLACE'];?></php></td>
                    <td><?php echo $res['BOOK_DATE'];?></php></td>
                    <td><?php echo $res['DURATION'];?></php></td>
                    <td><?php echo $res['PHONE_NUMBER'];?></php></td>
                    <td><?php echo $res['DESTINATION'];?></php></td>
                    <td><?php echo $res['RETURN_DATE'];?></php></td>
                    <td><?php echo $res['BOOK_STATUS'];?></php></td>
                    <td><a class="but" data-confirm="Approve this booking?" href="approve.php?id=<?php echo $res['BOOK_ID']?>">APPROVE</a></td>
                    <td><a class="but" data-confirm="Mark car returned?" href="adminreturn.php?id=<?php echo $res['CAR_ID']?>&bookid=<?php echo $res['BOOK_ID']?>">RETURNED</a></td>
                </tr>
               <?php } ?>
                </tbody>
                </table>
                
                </div>
            </div>
    </div>
    </div>
<script src="js/admin.js"></script>
</body>
</html>