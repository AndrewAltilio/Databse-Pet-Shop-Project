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
  <title>Pet Shop Select</title>
</head>

<body>
  <center>
  <h1>Pet Shop Seller Select!</h1>
  
  <h2>Welcome <?php echo $_SESSION['id']; ?></h2>
<!-- Link to insert item -->
<form action="http://cyan.csam.montclair.edu/~altilia3/Final%20Project%20DB/InsertItem.php">
    <input type="submit" value="Insert new Item" />
</form>

<!-- Link to delete item -->
<form action="http://cyan.csam.montclair.edu/~altilia3/Final%20Project%20DB/Delete%20Item.php">
    <input type="submit" value="Delete existing Item" />
</form>

<!-- Logout -->
<form action="http://cyan.csam.montclair.edu/~altilia3/Final%20Project%20DB/SellerLogout.php">
    <input type="submit" value="Logout" />
</form>

</center>
</body>
</html>