<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.1/css/all.min.css"
      href="main.js" 
    />
    <script src="main.js"></script>
  <link rel="stylesheet" href="css/pay.css" />
  <?php
  require_once('connection.php');
  session_start();
  $email  =   $_SESSION['email'] ?? '' ;

  $sql="select * from booking where EMAIL='$email' order by BOOK_ID DESC ";
  $cname = mysqli_query($con,$sql);
  $booking = mysqli_fetch_assoc($cname);
  $bid=$booking['BOOK_ID'] ?? 0;
  $_SESSION['bid']=$bid;

  if(isset($_POST['pay'])){
    $cardno=mysqli_real_escape_string($con,$_POST['cardno']);
    $exp=mysqli_real_escape_string($con,$_POST['exp']);
    $cvv=mysqli_real_escape_string($con,$_POST['cvv']);
    $price=$booking['PRICE'] ?? 0;
    if(empty($cardno) || empty($exp) ||  empty($cvv) ){
      echo '<script>alert("please fill the place")</script>';
    }
    else{
      $sql2="insert into payment (BOOK_ID,CARD_NO,EXP_DATE,CVV,PRICE) values($bid,'$cardno','$exp',$cvv,$price)";
      $result = mysqli_query($con,$sql2);
      if($result){
        header("Location: psucess.php");
        exit;
      }
    }

  }
  ?>
  <!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width,initial-scale=1" />
      <title>Payment</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.1/css/all.min.css">
      <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
      <div class="site-container">
        <h2 class="payment">TOTAL PAYMENT : <span>₹<?php echo htmlspecialchars($booking['PRICE'] ?? '0')?>/-</span></h2>

        <div class="card payment-card">
          <form method="POST" autocomplete="off">
            <h1 class="card__title">Enter Payment Information</h1>
            <div class="card__row">
              <div class="card__col">
                <label for="cardNumber" class="card__label">Card Number</label>
                <input type="text" class="card__input card__input--large" id="cardNumber" placeholder="xxxx-xxxx-xxxx-xxxx" required name="cardno" maxlength="16" />
              </div>
              <div class="card__col card__chip">
                <img src="images/chip.svg" alt="chip" />
              </div>
            </div>

            <div class="card__row">
              <div class="card__col">
                <label for="cardExpiry" class="card__label">Expiry Date</label>
                <input type="text" class="card__input" id="cardExpiry" placeholder="MM/YY" required name="exp" maxlength="5" />
              </div>
              <div class="card__col">
                <label for="cardCcv" class="card__label">CVV</label>
                <input type="password" class="card__input" id="cardCcv" placeholder="XXX" required name="cvv" maxlength="4" />
              </div>
              <div class="card__col card__brand"><i id="cardBrand"></i></div>
            </div>

            <div style="margin-top:12px;display:flex;gap:12px">
              <button type="submit" name="pay" class="btn btn--primary">PAY NOW</button>
              <a class="btn btn--ghost" href="cancelbooking.php">CANCEL</a>
            </div>
          </form>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
      <script src="main.js"></script>
      <script>
        // format card number and expiry using Cleave if available
        if(window.Cleave){
          new Cleave('#cardNumber', { creditCard: true });
          new Cleave('#cardExpiry', { date: true, datePattern: ['m','y'] });
        }
      </script>
    </body>
  </html>