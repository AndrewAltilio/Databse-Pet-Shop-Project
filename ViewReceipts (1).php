<?php
session_start();

if (!isset($_SESSION['id'])){
    echo "User not logged in. Please login first to access.";
    exit;
}

  @ $db = new mysqli('localhost', 'altilia3_AndrewAdmin', 'Altilio2001', 'altilia3_Final Project DB');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
  
  $query = "select * from RECEIPT where BName like '%".$_SESSION['id']."%'";
  $result = $db->query($query);

  $num_results = $result->num_rows;

  echo "<p>Number of results found: ".$num_results,"</p>";

  for ($i=0; $i < $num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". Order Number: ";
     echo $row['OrderNum'];
     echo "</strong><br />Item: ";
     echo $row['ItemName'];
     echo "<br />Price: $";
     echo $row['Price'];
     echo "<br />Total Price: ";
     echo $row['TotalPrice'];
     echo "<br />Date Purchased: ";
     echo $row['PurchaseDate'];
     echo "</p>";
  }

  $result->free();
  $db->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pet Shop Add to Cart</title>
</head>

<body>
    
  <h2>Search by date</h2>
  
  <form action="DateReceipts.php" method="post">
    <table border="0">
      <tr>
      <td>Year:</td>
      <td><select name="Year">
      <option value="2022">2022
    </select></td>
      </tr>
      <tr>
      <td>Month:</td>
      <td><select name="month">
      <option value="1">1
      <option value="2">2
      <option value="3">3
      <option value="4">4
      <option value="5">5
      <option value="6">6
      <option value="7">7
      <option value="8">8
      <option value="9">9
      <option value="10">10
      <option value="11">11
      <option value="12">12
    </select></td>
      </tr>
      <tr>
      <td>Day:</td>
      <td><select name="day">
      <option value="1">1
      <option value="2">2
      <option value="3">3
      <option value="4">4
      <option value="5">5
      <option value="6">6
      <option value="7">7
      <option value="8">8
      <option value="9">9
      <option value="10">10
      <option value="11">11
      <option value="12">12
      <option value="13">13
      <option value="14">14
      <option value="15">15
      <option value="16">16
      <option value="17">17
      <option value="18">18
      <option value="19">19
      <option value="20">20
      <option value="21">21
      <option value="22">22
      <option value="23">23
      <option value="24">24
      <option value="25">25
      <option value="26">26
      <option value="27">27
      <option value="28">28
      <option value="29">29
      <option value="30">30
      <option value="31">31
    </select></td>
      </tr>
    <form action="http://cyan.csam.montclair.edu/~altilia3/Final%20Project%20DB/DateReceipts.php">
    <input type="submit" value="Search" />
</form>