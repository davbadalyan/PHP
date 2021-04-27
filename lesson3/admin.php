<?php

require "./helpers.php";
auth()->redirectIfNotAuthenticated('client.php');
var_dump($_COOKIE["AuthCookie"]);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Admin Page</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Client Page</a>
                    </li>
                </ul>
                <?php if (auth()->checkLogin()) : ?>
                    <form action="controller.php" class="form-inline my-2 my-lg-0" method="POST">
                        <input class="form-control mr-sm-2" type="hidden" name="handle" />
                        <input type="hidden" name="form_name" value="log_out">
                        <input type="hidden" name="sort" value="login">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log Out</button>
                    </form>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <main>
        <h1 class="text-center">Hey <?php echo auth()->user()["name"] ?></h1>
    </main>
</body>

</html>