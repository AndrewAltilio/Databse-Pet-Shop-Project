<html>
<head>
  <title>Pet Shop Results</title>
</head>
<body>
<h1>Pet Shop Seller Signup Results</h1>
<?php
  // create short variable names
  $Fname=$_POST['Fname'];
  $Lname=$_POST['Lname'];
  $Email=$_POST['Email'];
  $SellerID =$_POST['ID'];
  $Address=$_POST['Address'];
  $Password=$_POST['Password'];
  

  if (!get_magic_quotes_gpc()) {
    $Fname = addslashes($Fname);
    $Lname = addslashes($Lname);
    $Email = addslashes($Email);
    $SellerID = doubleval($SellerID);
    $Address = addslashes($Address);
    $Password = addslashes($Password);
  }

  $hash = password_hash($Password, PASSWORD_DEFAULT);
  
  @ $db = new mysqli('localhost', 'altilia3_AndrewAdmin', 'Altilio2001', 'altilia3_Final Project DB');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  $query = "insert into SELLER values
            ('".$Fname."', '".$Lname."', '".$Email."',  '".$SellerID."', '".$Address."', '".$hash."')";
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