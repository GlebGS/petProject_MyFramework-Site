<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->meta["title"]; ?></title>

    <link rel="stylesheet" href="/css/style_adminAuth.css">
</head>
    
<body>

<form action="/auth_loginAdmin" method="post">
    <div class="body"></div>

    <div class="grad"></div>
    <div class="header">
        <div>Login<span>Admin</span></div>
    </div>
        <br>
    <div class="login">
        <input type="text" placeholder="email" name="email"><br>
        <input type="password" placeholder="password" name="password"><br>
        <input type="submit" value="Вход">
    </div>
</form>

</body>
</html>