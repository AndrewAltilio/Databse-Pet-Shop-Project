<?php
  session_start();
  echo $_SESSION['id'];
  
  // create short variable names
  $name=$_POST['name'];
  

  if (!$name) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  if (!get_magic_quotes_gpc()) {
    $name = addslashes($name);
  }

  @ $db = new mysqli('localhost', 'altilia3_AndrewAdmin', 'Altilio2001', 'altilia3_Final Project DB');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  $query = "DELETE FROM ITEM WHERE Name like '%".$name."%'";
  $result = $db->query($query);

  if ($result) {
      echo  $db->affected_rows." row of items deleted.";
  } else {
  	  echo "An error has occurred.  The item was not deleted.";
  }

  $db->close();
?>
<html>
<head>
  <title>Pet Shop Deletion Results</title>
</head>
<body>
<h1>Pet Shop Deletion Results</h1>
</body>
</html>