<?php
include_once "db.php";
$date = new DateTime('+1 day');
setcookie("token", time(), $date->getTimestamp());

$db = new DB();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    if ($db->insert($name, $email, $comment)) {
        header("Location:crossSiteScripting.php");
    } else {
        echo "<script>alert('ALERTTTTTTTTT');</script>";
    }
}else{
    $comments = $db->getComments();
}

?>
<style>
    * {
        font-family: sans-serif;
    }

    .wrapper {
        margin: 0 auto;
        border-radius: 20px;
        width: 35%;
        background-color: #202124;
    }

    input:not([type="submit"]),
    textarea {
        display: block;
        width: 100%;
        margin-bottom: 10px;
        padding: 5px;
    }

    form {
        padding: 30px;
        color: white;
    }

    input[type="submit"] {
        background-color: forestgreen;
        padding: 10px;
        border-radius: 25px;
        border: none;
    }

    ul {
        color: white;
        background-color: forestgreen;
        border-radius: 0 0 20px 20px;
        display: flex;
        justify-content: space-between;
        padding: 0%;
        overflow-x: scroll;
    }

    li {
        list-style: none;
        padding: 20px;
    }

    li:hover {
        background-color: #202124;
    }
</style>

<!-- HTML tags ignore -->
<!-- This is &lt;h1&gt; MEEE &lt;/h1&gt; -->
<div class="wrapper">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
        <h2 style="margin: 0 0 10px 0;">Fill whatever you want</h2>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter name">

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter email">

        <label for="comment">Comment</label>
        <textarea id="comment" name="comment" cols="30" rows="5" placeholder="Write"></textarea>

        <input type="submit" name="submit" id="submit" value="Enter">
    </form>

    <div class="pannel">
        <ul>
            <?php foreach($comments as $comment) : ?>
            <li>
                <span><?php echo $comment->comment ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>