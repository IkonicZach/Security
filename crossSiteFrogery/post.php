<?php
session_start();
require_once "db.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["_token"])) {
        if ($_POST["_token"] == $_SESSION["_token"]) {
            $db = new DB();
            $result = $db->insert($_POST["name"], $_POST["email"], $_POST["comment"]);
            echo $result ? "Successful" : "Failed";
        } else {
            echo "No Token";
        }
    } else {
        echo "invalid!!";
    }
}

$_SESSION["_token"] = bin2hex(openssl_random_pseudo_bytes(16));

?>