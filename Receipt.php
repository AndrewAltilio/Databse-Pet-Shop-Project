<?php
  session_start();
  
  echo $_SESSION['id'];
  echo "<br>";
  
  if (!isset($_SESSION['id'])){
    echo "User not logged in. Please login first to access.";
    exit;
  }
  
  include ViewCart.php;
  
  $OrderNum = rand(100000000, 999999999);
  $date = date("Y/m/d");
  
  echo "Your order number is: " . $OrderNum;
  echo "<br>";
  echo "Today is " . $date . "<br>";

  @ $db = new mysqli('localhost', 'altilia3_AndrewAdmin', 'Altilio2001', 'altilia3_Final Project DB');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
  
  $query =  "SELECT SUM(ItemPrice) FROM CART";
  $totalPrice = $db->query($query);
  
  while($row = mysqli_fetch_array($totalPrice)){
    echo "<br>";
    echo "<br>";
    echo " Total cost: $". $row['SUM(ItemPrice)'];
    echo "<br>";
    $taxPrice = $row['SUM(ItemPrice)'] * 1.7;
    echo " Total cost after tax: $". $taxPrice;
    echo "<br>";
  }
  
  $query = "SELECT * FROM CART";
  $result = $db->query($query);

  $num_results = $result->num_rows;
  
  for ($i=0; $i < $num_results; $i++) {
     $row = $result->fetch_assoc();
     
     //Updates quantity in Item table.
     $query = "UPDATE ITEM SET Quantity = Quantity - ".$row['Quantity']." WHERE Quantity > 0 AND Name like '%".$row['ItemName']."%'";
     $result1 = $db->query($query);
     
     //Inserts cart into Receipt table.
     $query = "insert into RECEIPT values
            ('".$OrderNum."', '".$row['ItemName']."', '".$row['ItemPrice']."',  '".$taxPrice."', '".$row['BFName']."', '".$date."')";
     $result2 = $db->query($query);
    
  }
  
  $query = "DELETE FROM CART";
  $result3 = $db->query($query);
  
  if ($result) {
      echo  $db->affected_rows." Items added to recipt!";
     } else {
  	  echo "An error has occurred. Items not purchased. Please try again.";
     }
     
  $db->close();
?>
