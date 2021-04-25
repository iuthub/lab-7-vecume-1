<?php

include('connection.php');

$message = "Fill the form";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $get_all = $db->prepare('SELECT * FROM users');
    $add_user_stm = $db->prepare('INSERT INTO users (username, email, password, fullname) VALUES (?,?,?,?)');

    $username = $_REQUEST["username"];
    $email = $_REQUEST["email"];
    $password = $_REQUEST["pwd"];
    $confirm_pwd = $_REQUEST["confirm_pwd"];
    $fullname = $_REQUEST["fullname"];
//    $dob = $_REQUEST["dob"];



    if ($password != $confirm_pwd) {
        $message = "Passwords should match";
    } else {

        if ( $add_user_stm->execute(array($username, $email, $password, $fullname))) {
            header('Location: index.php');
        }
    }
}

?>

<!DOCTYPE >
<html lang="en">
<head>
    <title>My Blog - Registration Form</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>

<body>
<?php include('header.php'); ?>

<h2>User Details Form</h2>
<h4>Please, fill below fields correctly</h4>
<form action="register.php" method="post">
    <mark><?php echo $message ?></mark>
    <ul class="form">
        <li>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required/>
        </li>
        <li>
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" id="fullname" required/>
        </li>
        <li>
            <label for="email">Email</label>
            <input type="email" name="email" id="email"/>
        </li>
        <li>
            <label for="pwd">Password</label>
            <input type="password" name="pwd" id="pwd" required/>
        </li>
        <li>
            <label for="confirm_pwd">Confirm Password</label>
            <input type="password" name="confirm_pwd" id="confirm_pwd" required/>

        </li>
        <li>
            <input type="submit" value="Submit"/> &nbsp; Already registered? <a href="index.php">Login</a>
        </li>
    </ul>
</form>
</body>
</html>