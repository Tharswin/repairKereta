
<?php 

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "spareparts";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  } catch (Exception $e) {
      echo "Error ". $e->getMessage();
      exit();
  }