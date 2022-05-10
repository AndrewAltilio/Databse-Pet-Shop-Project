<?php
session_start();

if (!isset($_SESSION['id'])){
    echo "User not logged in. Please login first to access.";
    exit;
}
echo $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Pet Shop Entry</title>
</head>

<body>
  <h1>Pet Shop Entry</h1>

  <form action="Insert_Item.php" method="post">
    <table border="0">
      <tr>
        <td>Product ID:</td>
         <td><input type="text" name="productID" maxlength="13" size="30"></td>
      </tr>
      <tr>
        <td>Name:</td>
        <td> <input type="text" name="name" maxlength="30" size="30"></td>
      </tr>
      <tr>
        <td>Description:</td>
        <td> <input type="text" name="description" maxlength="60" size="30"></td>
      </tr>
      <tr>
        <td>Quantity:</td>
        <td><input type="text" name="quantity" maxlength="7" size="30"></td>
      </tr>
      <tr>
        <td>Price: $</td>
        <td><input type="text" name="price" maxlength="7" size="30"></td>
      </tr>
      <tr>
      <td>Category:</td>
      <td><select name="category">
      <option value="puppy">Puppy
      <option value="food">Food
      <option value="toy">Toy
      <option value="leash">Leash
      <option value="bowl">Bowl
      <option value="collar">Collar
    </select></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Register"></td>
      </tr>
    </table>
  </form>
</body>
</html>
