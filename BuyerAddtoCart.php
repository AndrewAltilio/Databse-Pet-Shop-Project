<?php
  session_start();

  if (!isset($_SESSION['id'])){
    echo "User not logged in. Please login first to access.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pet Shop Add to Cart</title>
</head>

<body>
  <h1>Pet Shop Add to Cart</h1>
    
  <h2>What would you like to add <?php echo $_SESSION['id']; ?></h2>
  
  <form action="BuyerCartResults.php" method="post">
    <table border="0">
      <tr>
        <td>Product Name:</td>
         <td><input type="text" name="name" maxlength="30" size="30"></td>
      </tr>
      <tr>
        <td>Quantity:</td>
         <td><input type="text" name="quantity" maxlength="13" size="1"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Submit"></td>
      </tr>