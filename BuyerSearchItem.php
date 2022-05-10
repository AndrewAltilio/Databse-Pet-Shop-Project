<?php
session_start();
echo $_SESSION['id'];
if (!isset($_SESSION['id'])){
    echo "User not logged in. Please login first to access.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pet Shop Search</title>
</head>

<body>
<center>
  <h1>Pet Shop Search</h1>

<form action="BuyerSearchResults.php" method="post">
    Choose Search Type:<br />
    <select name="searchtype">
      <option value="puppy">Puppy
      <option value="food">Food
      <option value="toy">Toy
      <option value="leash">Leash
      <option value="bowl">Bowl
      <option value="collar">Collar
    </select>
    <br />
    <input type="submit" name="submit" value="Search">
</form>
</center>
</body>

</html>