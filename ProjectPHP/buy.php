<?php

  // error reporting
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // global array of posts, to be fetched from database
  $details = [];


  // Import functions
  require_once('validation/validation.php');

  // Validate form submission
  validate();


  require_once 'database/database.php';

  //connect to database: PHP Data object representing Database connection
  $pdo = db_connect();

  // submit details to database
  handle_form_submission();

  // get the data from database
  get_data();


 ?>
<!DOCTYPE html>
<html>

  <head>
    
    <meta charset="utf-8">
    <title>Buy</title>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/buyPage.css">
    <script>

        //this function will work when user press close or cancel transaction button and take them back to iphone13.php page
        $(function (){
    
            $("#close").on("click", function(e){
                e.preventDefault();
                window.location.href='iphone13.php';
            });

            $("#cancel").on("click", function(e){
                e.preventDefault();
                window.location.href='index.php';
            });

            $("#closeDetails").on("click", function(e){
              e.preventDefault();
              window.location.href='index.php';
          });


        });
    
    </script>
  </head>
  <body>

    <header>

        <h1 id="iphone">iPhone</h1>

        <nav>
            <div id="menu">Menu</div>
            <ul class="navLink">
                
                <li><a href=index.php>Home</a></li>

                <li><a href="iphone13.php">iPhone 13</a></li>
                <li><a href="iphone12.html">iPhone 12</a></li>
                <li><a href="iphone11.html">iPhone 11</a></li>
            
            </ul>
        </nav>

    </header>

    <main>

        <form action="buy.php" method="post" id="form2">

            <div class="payment">

                <h4>Shipping Information</h4>

                <label>First Name*:
                    <input type="text" name="firstName"/>
                    <?php the_validation_message('firstName'); ?>
                </label>

                <label>Last Name*:
                    <input type="text" name="lastName"/>
                    <?php the_validation_message('lastName'); ?>
                </label>

                <label>Email*:
                    <input type="email" name="email"/>
                    <?php the_validation_message('email'); ?>
                </label>

                <label>Address*:
                    <input type="text" name="address"/>
                    <?php the_validation_message('address'); ?>
                </label>

                <label>Comment:<textarea name="comment"></textarea></label>

           

                <h4 id="pay">Payment</h4>


                <label>Cardholder Name*:
                    <input type="text" name="cardholderName"/>
                    <?php the_validation_message('cardholderName'); ?>
                </label>


                <label>Card Number*:
                    <input type="number" name="cardNumber"/>
                    <?php the_validation_message('cardNumber'); ?>
                </label>

                
                <label>Expiry Date (MMYY)*:
                    <input type="number" name="expiryDate"/>
                    <?php the_validation_message('expiryDate'); ?>
                </label>


                <button id="proceed">Process Transaction</button>
                <button id="cancel">Cancel Transaction</button>
                <button id="close">Close</button>

            </div>

        </form>

        <?php get_details(); ?>

    </main>

  </body>

</html>