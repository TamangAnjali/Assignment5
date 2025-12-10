<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Dummy user data (in real applications, verify from database)
    $users = [
        "admin" => ["password" => "admin123", "role" => "admin"],
        "student" => ["password" => "stud123", "role" => "student"]
    ];

    if (isset($users[$username]) && $users[$username]["password"] === $password) {
        // Store user info in session
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $users[$username]["role"];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<form method="POST">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>

<?php if (!empty($error)) echo $error; ?>
