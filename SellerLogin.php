<?php
  
$db = new mysqli('localhost', 'altilia3_AndrewAdmin', 'Altilio2001', 'altilia3_Final Project DB');
  
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " 
        . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Seller Login</title>
</head>

<body>
	<div id="form">
		<h1>Seller Login</h1>
		<form name="form" action="Seller_login_verify.php" method="POST">

			<p>
				<label> Seller ID: </label>
				<input type="text" id="id"
					name="id" />
			</p>

			<p>
				<label> Password: </label>
				<input type="text" id="Pass"
					name="Pass" />
			</p>

			<p>
				<input type="submit"
					id="button" value="Login" />
			</p>
		</form>
	</div>
</body>

</html>
