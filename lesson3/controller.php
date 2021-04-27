<?php


spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

if ($_SERVER["REQUEST_METHOD"] !== "POST")
    header("Location: client.php");

$formName = $_POST["form_name"];

if (!isset($formName))
    echo "Invalid request was sent";

$auth = new Auth();

switch ($formName) {

    case "log_in":
        $login = $_POST["login"];
        $password = $_POST["password"];
        // die($login);
        $auth->login($login, $password);
        break;
    case "log_out":
        $handle = $_POST["handle"];
        if (!isset($handle))
            return "";
        $auth->logout();
}
