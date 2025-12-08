<!DOCTYPE html>
<html>
<head>
    <title>Set Favorite Color</title>
</head>
<body>

<h2>Select Your Favorite Color</h2>

<form method="post" action="">
    <label>Select a color:</label>
    <select name="user_color">
        <option value="red">Red</option>
        <option value="blue">Blue</option>
        <option value="green">Green</option>
    </select>
    <br><br>
    <button type="submit">Save Color</button>
</form>

<?php
if (isset($_POST['user_color'])) {
    $color = $_POST['user_color'];

    // Set cookie (expires in 1 hour)
    setcookie("user_color", $color, time() + 3600, "/");

    echo "<p>Cookie set successfully! Go to <a href='show_color.php'>show_color.php</a></p>";
}
?>

</body>
</html>
