<?php 

setcookie("username", "subash", time() + (86400 * 30), "/");

header("location:dashboard.php");

echo "login form here";


