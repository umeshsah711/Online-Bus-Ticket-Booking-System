<?php
// Logout and redirect back to the login page
session_start();
session_destroy();
header('Location: index.php');
exit();
?>
