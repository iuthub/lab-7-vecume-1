<?php
$user = $_SESSION["user"];
$fullname = $user["fullname"];
$email = $user["email"]
?>

<ul>
    <li><span>Fullname: </span> <span><?= $fullname ?></span></li>
    <li><span>Email: </span> <span><?= $email ?></span></li>
</ul>