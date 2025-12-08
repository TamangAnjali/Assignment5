<?php
session_start();


if (isset($_GET['reset'])) {
    unset($_SESSION['visit_count']);
    echo "Counter has been reset.<br>";
}

if (!isset($_SESSION['visit_count'])) {
    $_SESSION['visit_count'] = 1;
} else {
    $_SESSION['visit_count']++;
}

echo "You have visited this page " . $_SESSION['visit_count'] . " times in this session.";
?>

<br><br>
<a href="visit.php">Refresh Page</a> |
<a href="visit.php?reset=true">Reset Counter</a>
