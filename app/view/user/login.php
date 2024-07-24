<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($data['error'])): ?>
        <p style="color: red;"><?php echo $data['error']; ?></p>
    <?php endif; ?>
    <form action="/project/public/index.php/user/login" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    <a href="/project/public/index.php/user/register">Register</a>
</body>
</html>
