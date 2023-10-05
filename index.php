<?php

$db = new PDO("mysql:host=localhost;dbname=hackingtest", "root", "");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $query = $db->query("SELECT * FROM users WHERE name='$name'");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    echo "<pre>" . print_r($result, true) . "</pre>";
}

//1 id= '' OR 1=1
//2 id= `' UNION SELECT * FROM users`'
//3 id=1 `; DROP TABLE posts;

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="name" id="">
    <input type="submit" name="" id="">
</form>