<?php
session_start();
session_unset();
session_destroy();
header("Location: ../recursos/login3.html");
?>

