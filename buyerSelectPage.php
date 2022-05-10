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
  <h1>Pet Shop Buyer Select!</h1>
  
  <h2>Welcome <?php echo $_SESSION['id']; ?></h2>
<!-- Link to search items -->
<form action="http://cyan.csam.montclair.edu/~altilia3/Final%20Project%20DB/BuyerSearchItem.php">
    <input type="submit" value="Search Catalogue" />
</form>

<!-- Link to buy item -->
<form action="http://cyan.csam.montclair.edu/~altilia3/Final%20Project%20DB/BuyerAddtoCart.php">
    <input type="submit" value="Add to Cart" />
</form>

<!-- Link to view and submit cart -->
<form action="http://cyan.csam.montclair.edu/~altilia3/Final%20Project%20DB/ViewCart.php">
    <input type="submit" value="View Cart" />
</form>

<!-- Link to view receipts -->
<form action="http://cyan.csam.montclair.edu/~altilia3/Final%20Project%20DB/ViewReceipts.php">
    <input type="submit" value="View Orders" />
</form>

<!-- Logout -->
<form action="http://cyan.csam.montclair.edu/~altilia3/Final%20Project%20DB/SellerLogout.php">
    <input type="submit" value="Logout" />
</form>

</center>
</body>
</html>