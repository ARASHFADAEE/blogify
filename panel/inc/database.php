
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/blog/panel/config.php';

try {
    $conn = new PDO("mysql:host=".SERVER_NAME.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
  };
  
?>