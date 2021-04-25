<?php
if (isset($_REQUEST["logout"])) {
    session_destroy();
    header('Location: index.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $body = $_REQUEST["body"];
    $title = $_REQUEST["title"];
    $author_id = $_SESSION["user"]["id"];

    $add_post = $db->prepare("INSERT INTO posts (title, body, userId) VALUES (?,?,?)");
    $add_post->execute(array($title, $body, $author_id));
}



?>

<div class="logout_panel"><a href="index.php?logout=1">Log Out</a></div>

<?php
include("myprofile.php");
?>

<h2>New Post</h2>

<form action="index.php" method="post">
    <ul class="form">
        <li>
            <label for="title">Title</label>
            <input type="text" name="title" id="title"/>
        </li>
        <li>
            <label for="body">Body</label>
            <textarea name="body" id="body" cols="30" rows="10"></textarea>
        </li>
        <li>
            <input type="submit" value="Post"/>
        </li>
    </ul>
</form>