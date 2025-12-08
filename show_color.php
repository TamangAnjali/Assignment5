<!DOCTYPE html>
<html>
<head>
    <title>Show Selected Color</title>
</head>
<body>

<?php
if (isset($_COOKIE['user_color'])) {
    echo "<h2>Your selected color is: " . $_COOKIE['user_color'] . "</h2>";
} else {
    echo "<h2>No color cookie found!</h2>";
}
?>

</body>
</html>
