<?php 

$date = new DateTime("+1 week");

$value = password_hash("696969", PASSWORD_BCRYPT, ["cost"=>10]);

setcookie("token",$value, $date->getTimestamp(),'/',null,null,true);
