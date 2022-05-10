<?php
session_start();

$_SESSION = array();

session_destroy();

echo "user logged out!";
echo "<a href=http://cyan.csam.montclair.edu/~altilia3/Final%20Project%20DB/Home%20Page.html>Homepage</a>";
?>