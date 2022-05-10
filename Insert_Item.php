<html>
<head>
  <title>Pet Shop Entry Results</title>
</head>
<body>
<h1>Pet Shop Entry Results</h1>
<?php
  // create short variable names
  $id=$_POST['productID'];
  $name=$_POST['name'];
  $desc=$_POST['description'];
  $quantity=$_POST['quantity'];
  $price=$_POST['price'];
  $category=$_POST['category'];

  if (!$id || !$name || !$desc || !$quantity || !$price || !$category) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  if (!get_magic_quotes_gpc()) {
    $id = doubleval($id);
    $name = addslashes($name);
    $desc = addslashes($desc);
    $quantity = doubleval($quantity);
    $price = doubleval($price);
    $category = addslashes($category);
  }

  @ $db = new mysqli('localhost', 'altilia3_AndrewAdmin', 'Altilio2001', 'altilia3_Final Project DB');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }
  
  if ($quantity <= 0)
  {
      echo "Please input a value greater than 0";
      exit;
      $db->close();
  }

  $query = "insert into ITEM values
            ('".$id."', '".$name."', '".$desc."', '".$quantity."', '".$category."', '".$price."')";
  $result = $db->query($query);

  if ($result) {
      echo  $db->affected_rows." item inserted into database.";
  } else {
  	  echo "An error has occurred.  The item was not added.";
  }

  $db->close();
?>
</body>
</html>
