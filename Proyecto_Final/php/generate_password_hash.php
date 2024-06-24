<?php
$password_admin = '123456'; // Cambia esto por la contraseña que quieras para el administrador
$password_operator = '654321'; // Cambia esto por la contraseña que quieras para el operador

$hashed_password_admin = password_hash($password_admin, PASSWORD_DEFAULT);
$hashed_password_operator = password_hash($password_operator, PASSWORD_DEFAULT);

echo "Administrador contraseña cifrada: " . $hashed_password_admin . "\n";
echo "Operador contraseña cifrada: " . $hashed_password_operator . "\n";
?>
