<?php
session_start();

// If already logged in, redirect to dashboard
if (isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Static admin login
  if ($username === "admin" && $password === "admin") {
    $_SESSION['username'] = "ADMIN";
    header("Location: index.php");
    exit();
  } else {
    $error = "Invalid username or password!";
  }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="/assessment_beginner/assets/style.css?v=3">
</head>
<body>

<h1>Login</h1>

<?php if ($error !== ""): ?>
  <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="post" autocomplete="off">
  <label>Username</label><br>
  <input type="text" name="username" required><br><br>

  <label>Password</label><br>
  <input type="password" name="password" required><br><br>

  <button type="submit">Login</button>
</form>

</body>
</html>