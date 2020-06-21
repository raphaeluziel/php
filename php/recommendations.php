<?php

$servername = "localhost";
$dbname = "raphaelu_recsdb";
$username = "raphaelu_ziel";
$password = "put in your password here";

// define variables and set to empty values
$firstNameErr = $lastNameErr = $emailErr = "";
$firstName = $lastName = $email = "";
$q1 = $q2 = $q3 = $q4 = $q5 = $q6 = "";
$status = "Not Submitted";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstName"])) {
    $firstNameErr = "First name is required";
  } else {
    $firstName = test_input($_POST["firstName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
      $firstNameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["lastName"])) {
    $lastNameErr = "Last name is required";
  } else {
    $lastName = test_input($_POST["lastName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
      $lastNameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  $q1 = test_input($_POST["question01"]);
  $q2 = test_input($_POST["question02"]);
  $q3 = test_input($_POST["question03"]);
  $q4 = test_input($_POST["question04"]);
  $q5 = test_input($_POST["question05"]);
  $q6 = test_input($_POST["question06"]);

}



try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO Responses (firstname, lastname, email, question01, question02, question03, question04, question05, question06) VALUES (:firstname, :lastname, :email, :question01, :question02, :question03, :question04, :question05, :question06)");
  $stmt->bindParam(':firstname', $firstName);
  $stmt->bindParam(':lastname', $lastName);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':question01', $q1);
  $stmt->bindParam(':question02', $q2);
  $stmt->bindParam(':question03', $q3);
  $stmt->bindParam(':question04', $q4);
  $stmt->bindParam(':question05', $q5);
  $stmt->bindParam(':question06', $q6);

  // insert a row

  $stmt->execute();

  echo "New records created successfully";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;


?>
