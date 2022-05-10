<?php
session_start();

if (!isset($_SESSION['id'])){
    echo "User not logged in. Please login first to access.";
    exit;
}

  $year=$_POST['Year'];
  $month=$_POST['month'];
  $day=$_POST['day'];
  
  $date = $year . "-" . $month . "-" . $day;
  $user = $_SESSION['id'];

  @ $db = new mysqli('localhost', 'altilia3_AndrewAdmin', 'Altilio2001', 'altilia3_Final Project DB');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
  
  $query = "SELECT RECEIPT.PurchaseDate, RECEIPT.OrderNum, BUYER.FName FROM RECEIPT INNER JOIN BUYER ON RECEIPT.PurchaseDate = '$date'";
  $result = $db->query($query);
  
  $num_results = $result->num_rows;

  echo "<p>Number of results found: ".$num_results,"</p>";

  for ($i=0; $i < $num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p>".($i+1).". Order Number: ";
     echo $row['OrderNum'];
     echo "<br />Name: ";
     echo $row['FName'];
     echo "<br />Date Purchased: ";
     echo $row['PurchaseDate'];
     echo "</p>";
  }
  
  
  $db->close();