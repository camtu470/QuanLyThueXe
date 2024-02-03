<?php
session_start();

// Destroy the user's session
session_destroy();

// Redirect to the login page
header('Location: index.php');
exit;
?>
