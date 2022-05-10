<?php
  session_start();
  // create short variable names
  $email=$_POST['email'];
  $password=$_POST['Pass'];

  if (!$email || !$password) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  @ $db = new mysqli('localhost', 'altilia3_AndrewAdmin', 'Altilio2001', 'altilia3_Final Project DB');
   
  $sanitized_email = mysqli_real_escape_string($db, $email);
      
  $sanitized_password = mysqli_real_escape_string($db, $password);
  

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }
  
  $query = "SELECT * FROM BUYER WHERE Email = '$sanitized_email'";
  $result = $db->query($query);
  
  if ($result->num_rows === 1) {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      
      if (password_verify($password, $row['PASSWORD'])) 
      {
        $_SESSION['id'] = $row['FName'];
        echo $_SESSION['id'];
        
        echo "login successful!";
        echo "<a href=buyerSelectPage.php>buyer Homepage</a>";
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