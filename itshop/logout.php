<?php
session_start();

session_destroy();

echo "You have successfully logged out, please waiting.<br>";

header("Refresh: 3, url=index.php");
exit(0);
?>