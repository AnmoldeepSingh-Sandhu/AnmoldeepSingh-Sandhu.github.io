<?php

$validation = false;
$error_messages = Array();

//this will validate the form
function validateSelection()
{
    global $validation;
    global $error_messages;

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        $count=0;

        if(isset($_POST['color'])){
            $count++;

        }else{
            $error_messages[0] = "Please choose a color for your phone.";
        }

        if(isset($_POST['storage'])){
            $count++;

        }else{
            $error_messages[1] = "Please choose a storage for your phone.";
        }

        if($count == 2){
            $validation = true;


            // This is used to transfer form data from iphone13.php to database.php
            session_start();

            $_SESSION['color'] = $_POST['color'];

            $_SESSION['storage'] = $_POST['storage'];

        ?>

        <script>
            window.location = "buy.php";
        </script>

        <?php

        }else{
            $validation = false;
        }

    }

}
  


// this function will be used display error message if fields not valid. Displays nothing if the fields is valid.
function the_error_message($type) {

    global $error_messages;
  
    if($_SERVER['REQUEST_METHOD']== 'POST'){


        if(!empty($error_messages)){
  
            if($type == 'color' && !empty($error_messages[0])){

                echo "<p class=failure-message>$error_messages[0]</p>";

            };
            

            if($type == 'storage' && !empty($error_messages[1])){

                echo "<p class=failure-message>$error_messages[1]</p>";

            };


        };


    };

};


validateSelection();


?>
<!DOCTYPE html>
<html>

  <head>
    
    <meta charset="utf-8">
    <title>iPhone 13</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/styleIphone13.css">
    <link
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />


    <script>

        let slideIndex = 1;

        // Next/previous controls
        function slideChanger(num){
            showSlides(slideIndex += num);

        }


        function showSlides(num){

            let i;
            let slides = document.getElementsByClassName("slideImage");
            

            if(num > slides.length){
                slideIndex = 1;
            }

            if(num < 1){
                slideIndex = slides.length;
            }

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
       
            slides[slideIndex-1].style.display = "block";

        }


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

        <div id="iphone13Grid">

            <div id="new">New</div>
            <div id="buy">Buy iPhone 13</div>
            <div id="price">From $1,099.00 to $1,509.00</div>
            <img src="images/iphone13.jpg" alt="iphone 13 image" id="abc"/>



            <form action="iphone13.php" method="post" id="form1">

                <div id="color">Finish. <span>Pick your favourite.</span></div>

                <div id="colorGrid">
                
                    <label class="labelColor"><input type="radio" name="color" value="Green"/>Green</label>
                    <label class="labelColor"><input type="radio" name="color" value="Pink"/>Pink</label>
                    <label class="labelColor"><input type="radio" name="color" value="Blue"/>Blue</label>
                    <label class="labelColor"><input type="radio" name="color" value="Black"/>Black</label>
                    <label class="labelColor"><input type="radio" name="color" value="White"/>White</label>
                    <label class="labelColor"><input type="radio" name="color" value="Red"/>Red</label>
                    <?php the_error_message('color') ?>
                </div>


                <div id="storage">Storage. <span>How much space do you need?</span></div>
                <label class="labelStorage"><input type="radio" name="storage" value="128GB"><span>128GB</span><span>$1,099.00</span></label>
                <label class="labelStorage"><input type="radio" name="storage" value="256GB"><span>256GB</span><span>$1,239.00</span></label>
                <label class="labelStorage"><input type="radio" name="storage" value="512GB"><span>512GB</span><span>$1,509.00</span></label>
                <?php the_error_message('storage') ?>

                <div id="buttonDiv"><button id="button">Buy</button></div>

            </form>


        </div>

        <div id="specifications">

            <span>Specifications</span>

            <ul id="featuresGrid">

                <li class="feature">
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                    <span class="span" id="span1">6.1" or 5.4"</span>
                    <span class="span" id="span2">All-screen OLED display</span>
                </li>

                <li class="feature">
                    <i class="fa fa-camera" aria-hidden="true"></i>
                    <span class="span" id="span3">Advanced dual-camera system</span>
                    <span class="span" id="span4">Wide, Ultra Wide</span>
                </li>

                <li class="feature">
                    <span class="span" id="span5">A15 Bionic chip</span>
                    <span class="span" id="span6">4-core GPU</span>
                </li>

                <li class="feature">
                    <span class="span" id="span7">Superfast</span>
                    <span class="span" id="span8">5G</span>
                    <span class="span" id="span9">cellular</span>
                </li>

                <li class="feature">
                    <i class="fa fa-battery-full" aria-hidden="true"></i>
                    <span class="span" id="span10">Up to 19 hours video playback</span>
                </li>

                <li class="feature">
                    <i class="fa fa-id-badge" aria-hidden="true"></i>
                    <span class="span" id="span11">Face ID</span>
                </li>

            </ul>

        </div>



        
        <div class="slideshow">

            <div>Image Gallery</div>

        
            <img src="images/gallery/1.jpg" class="slideImage">
            <img src="images/gallery/2.jpg" class="slideImage">
            <img src="images/gallery/3.jpg" class="slideImage">
            <img src="images/gallery/4.jpg" class="slideImage">
            <img src="images/gallery/5.jpg" class="slideImage">
            <img src="images/gallery/6.jpg" class="slideImage">
            <img src="images/gallery/7.jpg" class="slideImage">


            <!-- Next and previous buttons -->
            <a class="prev" onclick="slideChanger(-1)">&#10094;</a>
            <a class="next" onclick="slideChanger(1)">&#10095;</a>


        </div>

    </main>

    <script>showSlides(slideIndex);</script>

  </body>

</html>