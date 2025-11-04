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
$cur = basename($_SERVER['PHP_SELF']);
$query="select *from feedback";
$queryy=mysqli_query($con,$query);
$num=mysqli_num_rows($queryy);


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
        <div>
            <h1 class="header">FEEDBACKS</h1>
            <div>
                <div>
                    <table class="content-table">
                <thead>
                    <tr>
                        <th>FEEDBACK_ID</th> 
                        <th>EMAIL</th>
                        <th>COMMENT</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                
                while($res=mysqli_fetch_array($queryy)){
                
                
                ?>
                <tr  class="active-row">
                    <td><?php echo $res['FED_ID'];?></php></td>
                    <td><?php echo $res['EMAIL'];?></php></td>
                    <td><?php echo $res['COMMENT'];?></php></td>
                </tr>
               <?php } ?>
                </tbody>
                </table>
                </div>
            </div>
    </div>
    </div>
    
</body>
</html>