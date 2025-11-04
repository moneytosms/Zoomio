<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" href="css/app.css">
    <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
</head>
<body>
<div class="site-container">

<?php
    require_once('connection.php');
    if(isset($_POST['adlog'])){
        $id=$_POST['adid'];
        $pass=$_POST['adpass'];
        
        
        if(empty($id)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }

        else{
            $query="select *from admin where ADMIN_ID='$id'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['ADMIN_PASSWORD'];
                if($pass  == $db_password)
                {
                    
                    // session_start();
                    // $_SESSION['email'] = $email;
                    echo '<script>alert("Welcome ADMINISTRATOR!");</script>';
                    header("location: admindash.php");
                    
                }
                else{
                    echo '<script>alert("Enter a proper password")</script>';
                }



                



            }
            else{
                echo '<script>alert("enter a proper email")</script>';
            }
        }
    }




    







?>




<a class="back back--primary" href="index.php">Go To Home</a>

<header class="hello">HELLO ADMIN!</header>

    <form method="POST" action="">
    <main class="card form">
        <h2>Admin Login</h2>
        <div class="field"><label class="muted">Admin ID</label><input type="text" name="adid" placeholder="Enter admin user id" required></div>
        <div class="field"><label class="muted">Password</label><input type="password" name="adpass" placeholder="Enter admin password" required></div>
        <div class="field"><input type="submit" class="btn btn--accent" value="LOGIN" name="adlog"></div>
    </main>
    </form>

</div>
</body>
</html>