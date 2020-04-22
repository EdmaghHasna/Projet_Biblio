
<?php
$servername = "localhost";
$name = "root";
$pass = "";
$dbname = "librairie";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $name , $pass );
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //   echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>