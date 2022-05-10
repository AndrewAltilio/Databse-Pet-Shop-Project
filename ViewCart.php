<?php
  session_start();
  
  echo $_SESSION['id'];
  
  if (!isset($_SESSION['id'])){
    echo "User not logged in. Please login first to access.";
    exit;
  }
  
  @ $db = new mysqli('localhost', 'altilia3_AndrewAdmin', 'Altilio2001', 'altilia3_Final Project DB');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
  
  $query =  "SELECT SUM(QuantityPrice) FROM CART";
  $totalPrice = $db->query($query);
  
  while($row = mysqli_fetch_array($totalPrice)){
    echo "<br>";
    echo "<br>";
    $Total = $row['SUM(QuantityPrice)'];
    echo " Total cost: $". $Total;
    echo "<br>";
    $taxPrice = $Total + ($Total * 0.07);
    echo " Total cost after tax: $". $taxPrice;
    echo "<br>";
  }

  $query = "SELECT * FROM CART";
  $result = $db->query($query);

  $num_results = $result->num_rows;
  
  echo "<p>Number of items in cart: ".$num_results,"</p>";
  
  echo "<a href=Receipt.php>Submit Order</a>";

  for ($i=0; $i < $num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". Name: ";
     echo $row['ItemName'];
     echo "</strong><br />Price: $";
     echo $row['ItemPrice'];
     echo "<br />Quantity: ";
     echo $row['Quantity'];
     echo "</p>";
  }
  
  echo "<a href=Receipt.php>Submit Order</a>";

  $result->free();
  $db->close();
?>