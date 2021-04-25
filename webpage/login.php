<?php
    $login_stm = $db->prepare('SELECT * from users WHERE username=? AND password=?');

    $message = "Fill the form";

    $username = $_REQUEST["username"];
    $password = $_REQUEST["pwd"];

    $login_stm->execute(array($username, $password));
    $result = $login_stm->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION["user"] = $result;
        header('Location: index.php');
    } else {
        $message = "Wrong passsword or username try again!";
    }
?>

<div class="twocols">

    <form action="index.php" method="post" class="twocols_col">
        <mark><?= $message ?></mark>
        <ul class="form">
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" />
            </li>
            <li>
                <label for="pwd">Password</label>
                <input type="password" name="pwd" id="pwd" />
            </li>
            <li>
                <label for="remember">Remember Me</label>
                <input type="checkbox" name="remember" id="remember" checked />
            </li>
            <li>
                <input type="submit" value="Submit" /> &nbsp; Not registered? <a href="register.php">Register</a>
            </li>
        </ul>
    </form>
    <div class="twocols_col">
        <h2>About Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur libero nostrum consequatur dolor. Nesciunt eos dolorem enim accusantium libero impedit ipsa perspiciatis vel dolore reiciendis ratione quam, non sequi sit! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio nobis vero ullam quae. Repellendus dolores quis tenetur enim distinctio, optio vero, cupiditate commodi eligendi similique laboriosam maxime corporis quasi labore!</p>
    </div>
</div>