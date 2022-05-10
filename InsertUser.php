<html>
<head>
  <title>Pet Shop Results</title>
</head>
<body>
<h1>Pet Shop Signup Results</h1>
<?php
  // create short variable names
  $Fname=$_POST['Fname'];
  $Lname=$_POST['Lname'];
  $Email=$_POST['Email'];
  $Password=$_POST['Password'];
  $Phone=$_POST['Phone'];
  $Address=$_POST['Address'];

  if (!get_magic_quotes_gpc()) {
    $Fname = addslashes($Fname);
    $Lname = addslashes($Lname);
    $Email = addslashes($Email);
    $Password = addslashes($Password);
    $Phone = doubleval($Phone);
    $Address = addslashes($Address);
  }
  
  $hash = password_hash($Password, PASSWORD_DEFAULT);
  
  @ $db = new mysqli('localhost', 'altilia3_AndrewAdmin', 'Altilio2001', 'altilia3_Final Project DB');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  $query = "insert into BUYER values
            ('".$Fname."', '".$Lname."', '".$Email."',  '".$Phone."', '".$Address."', '".$hash."')";
  $result = $db->query($query);

  if ($result) {
      echo  $db->affected_rows." User succefully created!";
  } else {
  	  echo "An error has occurred. User not created. Please try again.";
  }

  $db->close();
?>
</body>
</html>
