<?php
  session_start();
  
  echo $_SESSION['id'];
  
  if (!isset($_SESSION['id'])){
    echo "User not logged in. Please login first to access.";
    exit;
  }
  
 // create short variable names
  $name=$_POST['name'];
  $quantity=$_POST['quantity'];
  $user = $_SESSION['id'];
  
  
  if (!$name || !$quantity)
  {
      echo "Please input all fields";
  }
  if (!get_magic_quotes_gpc()){
    $name = addslashes($name);
    $quantity = doubleval($quantity);  
    }
    
  @ $db = new mysqli('localhost', 'altilia3_AndrewAdmin', 'Altilio2001', 'altilia3_Final Project DB');
    
  if (mysqli_connect_errno()) {
    echo 'Error: Could not connect to database.  Please try again later.';
    exit;
  }
  
 //Query for the Item name selected by user.
  $query = "SELECT Name FROM ITEM WHERE Name = '".$name."'";
  $result1 = $db->query($query);
  $row = mysqli_fetch_assoc($result1);
  $Pname = $row['Name'];

 //Query for the price of the item.
  $query = "SELECT Price FROM ITEM WHERE Name = '".$name."'";
  $result2 = $db->query($query);
  $row = mysqli_fetch_assoc($result2);
  $Pprice = $row['Price'];
  
 //Query for the Quantity to make sure the quantity selected is less or equal to amount requested.
  $query = "SELECT Quantity FROM ITEM WHERE Name = '".$name."'";
  $result4 = $db->query($query);
  $row = mysqli_fetch_assoc($result4);
  $Pquantity = $row['Quantity'];
  
  if (!($quantity <= $Pquantity)){
      echo " Amount requested greater than amount stored. Please select an amount less than or equal to " . $Pquantity;
      exit;
  }
  
  $QPrice = $quantity * $Pprice;
  
 //Query for the name of the user that matches the session user
  $query = "SELECT FName FROM BUYER WHERE FName = '".$user."'";
  $result3 = $db->query($query);
  $row = mysqli_fetch_assoc($result3);
  $UName = $row['FName'];

  $query = "insert into CART values
            ('".$Pname."', '".$Pprice."', '".$quantity."', '".$UName."', '".$QPrice."')";
  $result = $db->query($query);
  
  if ($result) {
      echo  $db->affected_rows." row of items added to cart.";
  } else {
  	  echo " An error has occurred.  The item was not added.";
  }
  
  $db->close();

?>
<html>
<head>
  <title>Pet Shop Cart Results</title>
</head>
<body>
<h1>Pet Shop Cart Results</h1>
</body>
</html>