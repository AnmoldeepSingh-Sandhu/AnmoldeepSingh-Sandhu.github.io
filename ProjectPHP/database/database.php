<?php
require 'config.php';

// Should return a PDO
function db_connect() {

  try {
    
    // return $pdo;
    $host = DBHOST;
    $name = DBNAME;
    $user = DBUSER;
    $pass = DBPASS;
    $connString = "mysql:host=$host;dbname=$name";
    
    $pdo = new PDO($connString,$user,$pass);

    return $pdo;
    
  }
  catch (PDOException $e)
  {
    die($e->getMessage());
  }
}


//this function will submit the data into database
function handle_form_submission() {

  global $pdo;

  global $valid;
  
  global $color;

  global $storage;


  // This is used to transfer form data from iphone13.php to database.php
  session_start();
  $color = $_SESSION['color'];
  $storage = $_SESSION['storage'];
  

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {

    if($valid == true){

      $sql = "INSERT INTO data (firstName,lastName,email,address,comment,color,storage) VALUES (:firstName, :lastName, :email, :address, :comment,:color,:storage)";
      $statement = $pdo->prepare($sql);
      $statement->bindValue(':firstName', $_POST['firstName']);
      $statement->bindValue(':lastName', $_POST['lastName']);
      $statement->bindValue(':email', $_POST['email']);
      $statement->bindValue(':address', $_POST['address']);
      $statement->bindValue(':comment', $_POST['comment']);
      $statement->bindValue(':color', $color);
      $statement->bindValue(':storage', $storage);
      $statement->execute();

    }
    
  }
  
}


// Get all details of last order from database and store in $details
function get_data() {
  global $pdo;
  global $details;


  $sql = "SELECT * FROM data ORDER BY ID DESC LIMIT 1";

  // run the query
  $result = $pdo->query($sql);

  // fetch a record from result set into an associative array
  while ($row = $result->fetch()) {

    $details[0] = $row;

  };

  $pdo = null;

};


?>