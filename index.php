
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>CAR RENTAL</title>
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
    <link  rel="stylesheet" href="css/app.css">
    <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
</head>
<body>



<?php
require_once('connection.php');
    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        
        
        if(empty($email)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }

        else{
            $query="select *from users where EMAIL='$email'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['PASSWORD'];
                if(md5($pass)  == $db_password)
                {
                    header("location: cardetails.php");
                    session_start();
                    $_SESSION['email'] = $email;
                    
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
    <div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Zoomio</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="aboutus.html">ABOUT</a></li>
                    <li><a href="#">SERVICES</a></li>
                    
                    <li><a href="contactus.html">CONTACT</a></li>
                  <li> <a class="btn btn--ghost" href="adminlogin.php">ADMIN LOGIN</a></li>
                </ul>
            </div>
        </div>
                <main class="site-container">
                    <section class="hero card">
                        <div class="hero-left">
                            <img src="images/zoomio_logo.png" alt="Zoomio" class="logo-img" />
                            <h1 class="header">Rent Your <br /><span>Dream Car</span></h1>
                            <p class="lead">Live the life of Luxury. Just rent a car of your choice from our
                                curated collection. Simple booking, transparent pricing, premium
                                service.</p>
                            <div style="margin-top:12px">
                                <a class="btn btn--primary" href="register.php">Join us</a>
                            </div>
                        </div>

                        <aside>
                            <div class="form card">
                                <h2>Login</h2>
                                <form method="POST">
                                    <div class="field">
                                        <input type="email" name="email" placeholder="Email" required />
                                        <input type="password" name="pass" placeholder="Password" required />
                                    </div>
                                    <div style="display:flex;gap:10px;margin-top:8px">
                                        <input class="btn btn--primary" type="submit" value="Login" name="login" />
                                        <a class="btn btn--ghost" href="register.php">Sign up</a>
                                    </div>
                                </form>
                                <p class="muted" style="margin-top:10px;font-size:13px">Forgot password? Contact support.</p>
                            </div>
                        </aside>
                    </section>
                </main>
        
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
