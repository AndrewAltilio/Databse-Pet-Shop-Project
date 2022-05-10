<?php
session_start();
echo $_SESSION['id'];
if (!isset($_SESSION['id'])){
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pet Shop Deletion</title>
</head>

<body>
  <h1>Pet Shop Deletion</h1>
    
  <h2>What would you like to delete <?php echo $_SESSION['id']; ?></h2>
  
  <form action="Delete Item Results.php" method="post">
    <table border="0">
      <tr>
        <td>Product Name:</td>
         <td><input type="text" name="name" maxlength="13" size="30"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Submit"></td>
      </tr>