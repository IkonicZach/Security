<?php
$pass = "111111";
$hash = password_hash($pass, PASSWORD_BCRYPT, ['cost'=>10]);

$con = password_verify($pass, $hash);
echo $con ? "True" : "False";
echo $hash;
?>