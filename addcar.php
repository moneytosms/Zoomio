<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
</head>
<body>
    <link rel="stylesheet" href="css/app.css">
    <div class="site-container">
<?php $cur = basename($_SERVER['PHP_SELF']); ?>

    <button id="back"><a href="adminvehicle.php">HOME</a></button>

    <div class="main">
        <div class="register">
            <h2>Enter Details Of New Car</h2>
            <form id="register"  action="upload.php" method="POST" enctype="multipart/form-data">    
                <label>Car Name : </label>
                <br>
                <input type ="text" name="carname" id="name" placeholder="Enter Car Name" required>
                <br><br>

                <label>Fuel Type : </label>
                <br>
                <input type ="text" name="ftype" id="name" placeholder="Enter Fuel Type" required>
                <br><br>

                <label>Capacity : </label>
                <br>
                <input type="number" name="capacity" min="1" id="name" placeholder="Enter Capacity Of Car" required>
                <br><br>
                
                <label>Price : </label>
                <br>
                <input type="number" name="price" min="1" id="name" placeholder="Enter Price Of Car for One Day(in rupees)" required>
                <br><br>

                <label>Car Image : </label>
                <br>
                <input type="file" name="image" required>
               <br><br>

                <input type="submit" class="btnn"  value="ADD CAR" name="addcar">
            </form>
        </div> 
    </div>
    </div>
</body>
</html>