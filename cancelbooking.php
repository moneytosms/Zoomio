<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANCEL BOOKING</title>
    <link rel="stylesheet" href="css/app.css">
    <?php $cur = basename($_SERVER['PHP_SELF']); ?>
</head>
<body>
<?php
        require_once('connection.php');
        session_start();
        $bid = $_SESSION['bid'];
        if(isset($_POST['cancelnow'])){
                $del = mysqli_query($con,"delete from booking where BOOK_ID = '$bid' order by BOOK_ID DESC limit 1");
                echo "<script>window.location.href='cardetails.php';</script>";
        }
?>

<div class="site-container">
    <div class="cancel-form card">
        <h1>ARE YOU SURE YOU WANT TO CANCEL YOUR BOOKING?</h1>
        <form method="POST">
            <div style="display:flex;gap:12px;justify-content:center;margin-top:16px">
                <button type="submit" name="cancelnow" class="btn btn--accent">CANCEL NOW</button>
                <a class="btn btn--ghost" href="payment.php">GO TO PAYMENT</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
