<?php
$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$name = getenv('DB_NAME');

$conn = new mysqli($host, $user, $pass, $name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // VULNERABLE QUERY - Direct concatenation
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $message = "Welcome " . $username . "! (Login Successful)";
    } else {
        $message = "Invalid Login. Try: admin' OR 1=1--";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>SQL Injection Lab</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background: #f0f2f5; }
        .login-box { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        input { display: block; width: 100%; margin-bottom: 1rem; padding: 0.5rem; }
        button { width: 100%; padding: 0.5rem; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Vulnerable Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
        <p><?php echo $message; ?></p>
        <hr>
        <small>Example Payload: <code>admin' OR 1=1--</code></small>
    </div>
</body>
</html>
