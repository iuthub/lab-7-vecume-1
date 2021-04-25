<?php
session_start();
include('connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>My Personal Page</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<?php include('header.php'); ?>
        <?php
            if (isset($_SESSION["user"])) {
                include ("newpost.php");
                include ("posts.php");
            } else {
                include_once ("login.php");
            }
        ?>
	</body>
</html>