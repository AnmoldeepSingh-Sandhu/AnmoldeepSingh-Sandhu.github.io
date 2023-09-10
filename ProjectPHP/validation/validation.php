<?php

// Global result of form validation
$valid = false;
// Global array of validation messages. For valid fields, message is ""
$val_messages = Array();



//this function will print the details in html when someone submit details in database
function get_details(){

    global $details;

    global $valid;

    

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        if($valid == true){

            echo "<div class=details>

                    <h2>Details</h2>
                    
                    <button id=closeDetails>X</button>"; 
                    

                    foreach($details as $detail){

                        echo "<div>First Name: $detail[1]</div>

                                <div>Last Name: $detail[2]</div>

                                <div id=email>Email: $detail[3]</div>

                                <div>Address: $detail[4]</div>";

                                if(strlen($detail[5]) == 0){
                                    echo "<div>Comment: No comment</div>";

                                }else{
                                    echo "<div>Comment: $detail[5]</div>";
                                }

                                
                                echo "<div>Phone Color: $detail[6]</div>

                                <div>Phone Storage: $detail[7]</div>";

                    };

                "<div>";
        };
    };
};




//this will validate the form
function validate()
{
    global $valid;
    global $val_messages;

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      

      $Email= '#^(.+)@([^\.].*)\.([a-z]{2,})$#';
      $counting = 0;// this will count if all inputs are correct or not



      // if($_POST['firstName'] == ucfirst($_POST['firstName'])){
      //   $counting++;

      // }else{
      //   $val_messages[0] = 'First letter of your name should be a capital letter.';

      // };

      if((strlen($_POST['firstName']) > 1) && (strlen($_POST['firstName']) < 15)){
        $counting++;

      }else{
        $val_messages[0] = 'Your first name length should be between 1 to 15.';

      };



      // if($_POST['lastName'] == ucfirst($_POST['lastName'])){
      //   $counting++;

      // }else{
      //   $val_messages[2] = 'First letter of your last name should be a capital letter.';

      // };


      if((strlen($_POST['lastName']) > 1) && (strlen($_POST['lastName']) < 15)){
        $counting++;

      }else{
        $val_messages[1] = 'Your last name length should be between 1 to 15.';

      };


      if(preg_match($Email, $_POST['email'])){
        $counting++;

      }else{
        $val_messages[2] = 'Please enter a valid email address';
      }


      if(strlen($_POST['address']) > 5 && (strlen($_POST['address']) < 50)){
        $counting++;

      }else{
        $val_messages[3] = 'Length of the address field should be 5 to 50.';

      };

      // if($_POST['cardholderName'] == ucfirst($_POST['cardholderName'])){
      //   $counting++;

      // }else{
      //   $val_messages[4] = 'First letter of name should be a capital letter.';

      // };


      if((strlen($_POST['cardholderName']) > 1) && (strlen($_POST['cardholderName']) < 30)){
        $counting++;

      }else{
        $val_messages[4] = 'Name length should be between 1 to 30.';

      };


      if(strlen($_POST['cardNumber']) == 12){
        $counting++;

      }else{
        $val_messages[5] = 'Please enter a valid 12 digit card number';

      };


      if(strlen($_POST['expiryDate']) == 4){
        $counting++;

      }else{
        $val_messages[6] = 'Please enter a valid expiry date of your card';

      }
      



      if($counting == 7){
        $valid = true;

      }else{
        $valid = false;

      };
      

    }
}



// this function will be used display error message if fields not valid. Displays nothing if the fields is valid.
function the_validation_message($type) {

  global $val_messages;

  if($_SERVER['REQUEST_METHOD']== 'POST')
  {
    if(!empty($val_messages)){

        if($type == 'firstName' && !empty($val_messages[0])){
  
          echo "<p class=failure-message>$val_messages[0]</p>";
  
        };



        // if($type == 'firstName' && !empty($val_messages[1])){
  
        //     echo "<p class=failure-message>$val_messages[1]</p>";
    
        // };


  
        // if($type == 'lastName' && !empty($val_messages[2])){
  
        //   echo "<p class=failure-message>$val_messages[2]</p>";
  
        // };



        if($type == 'lastName' && !empty($val_messages[1])){
  
            echo "<p class=failure-message>$val_messages[1]</p>";
    
        };



        if($type == 'email' && !empty($val_messages[2])){
  
            echo "<p class=failure-message>$val_messages[2]</p>";
    
        };
  


        if($type == 'address' && !empty($val_messages[3])){
  
          echo "<p class=failure-message>$val_messages[3]</p>";
  
        };



        // if($type == 'cardholderName' && !empty($val_messages[6])){
  
        //     echo "<p class=failure-message>$val_messages[6]</p>";
    
        // };


        if($type == 'cardholderName' && !empty($val_messages[4])){
  
            echo "<p class=failure-message>$val_messages[4]</p>";
    
        };



        if($type == 'cardNumber' && !empty($val_messages[5])){
  
            echo "<p class=failure-message>$val_messages[5]</p>";
    
        };



        if($type == 'expiryDate' && !empty($val_messages[6])){
  
            echo "<p class=failure-message>$val_messages[6]</p>";
    
        };

          
  
  
      }else{};
  

  };

};
