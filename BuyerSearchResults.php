<html>
<head>
  <title>Pet Shop Search Results</title>
</head>
<body>
<h1>Pet Shop Search Results</h1>
<?php
  // create short variable names
  $searchtype=$_POST['searchtype'];
  $searchterm=trim($_POST['searchterm']);

  if (!get_magic_quotes_gpc()){
    $searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);
  }

  @ $db = new mysqli('localhost', 'altilia3_AndrewAdmin', 'Altilio2001', 'altilia3_Final Project DB');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }

  $query = "select * from ITEM where Category like '%".$searchtype."%'";
  $result = $db->query($query);

  $num_results = $result->num_rows;

  echo "<p>Number of results found: ".$num_results,"</p>";

  for ($i=0; $i < $num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". Name: ";
     echo $row['Name'];
     echo "</strong><br />Description: ";
     echo $row['Description'];
     echo "<br />Product ID: ";
     echo $row['productID'];
     echo "<br />Quantity: ";
     echo $row['Quantity'];
     echo "<br />Price: $";
     echo $row['Price'];
     echo "</p>";
  }

  $result->free();
  $db->close();

?>
</body>
</html>