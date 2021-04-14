<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require "./Auth.php";
    $a = new Auth();
    $a->login("Admin", "password");
    echo $a;
?>
    <input type="text" name="login"><br><br>
    <input type="text" name="password"><br><br>
    <button type="submit">LogIn</button>
</body>
</html>