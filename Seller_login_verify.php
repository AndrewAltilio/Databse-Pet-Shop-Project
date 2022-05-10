<?php
  session_start();
  // create short variable names
  //include 'SellerLogin.php';
  $id=$_POST['id'];
  $password=$_POST['Pass'];

  if (!$id || !$password) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  //if (!get_magic_quotes_gpc()) {
    //$password = addslashes($password);
    //$id = doubleval($id);
  //}
  @ $db = new mysqli('localhost', 'altilia3_AndrewAdmin', 'Altilio2001', 'altilia3_Final Project DB');
   
  $sanitized_userid = mysqli_real_escape_string($db, $id);
      
  $sanitized_password = mysqli_real_escape_string($db, $password);
  

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }
  
  $query = "SELECT * FROM SELLER WHERE SellerID = '$sanitized_userid'";
  $result = $db->query($query);
  
  //$num = mysqli_fetch_array($result);

  if ($result->num_rows === 1) {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      
      if (password_verify($password, $row['Pass'])) 
      {
        $_SESSION['id'] = $row['FName'];
        echo $_SESSION['id'];
        
        echo "login successful!";
        echo "<a href=sellerSelectPage.php>Seller Homepage</a>";
      }  
      else 
      {
      echo "User not found. Please try again.";
      }
  }

  $db->close();
?>
<html>
<head>
  <title>Pet Shop Login Results</title>
</head>
<body>
<h1>Pet Shop Login Results</h1>
</body>
</html>