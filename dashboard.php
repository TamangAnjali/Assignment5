<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION["role"] !== "admin") {
    echo "Access denied! Only admin can view this page.";
    exit;
}
?>

<h2>Welcome Admin, <?php echo $_SESSION["username"]; ?></h2>
<a href="logout.php">Logout</a>
