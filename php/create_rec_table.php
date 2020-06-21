<?php

/*
  This file should be uploaded and run by going to its url ONCE
  DELETE this file from the server since the table is already created.
*/

$servername = "localhost";
$dbname = "raphaelu_recsdb";
$username = "raphaelu_ziel";
$password = "put in your password here";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $sql = "CREATE TABLE Responses (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50) NOT NULL,
  question01 VARCHAR(2500),
  question02 VARCHAR(2500),
  question03 VARCHAR(2500),
  question04 VARCHAR(2500),
  question05 VARCHAR(2500),
  question06 VARCHAR(2500),
  status ENUM('Not Submitted', 'Submitted', 'Pending', 'Written'),
  time_stamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Table recsdb created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>
