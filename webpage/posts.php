<?php
$get_posts = $db->prepare('SELECT posts.body, posts.title, posts.publishDate, user.fullname FROM posts INNER JOIN users user on posts.userId = user.id');

$get_posts->execute();
$posts = $get_posts->fetchAll();
?>

<div class="onecol">
    <?php
        foreach ($posts as $post) {
            $title = $post["title"];
            $author = $post["fullname"];
            $publish_date = $post["publishDate"];
            $body = $post["body"];
            include("card.php");
        }
    ?>
</div>