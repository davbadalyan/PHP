<?php

class Auth
{
    private $cookieKey = "AuthCookie";

    private $userService;

    public function __construct()
    {
        if(false)
            $this->userService = new MysqliUser();
        else
            $this->userService = new User();
    }

    private function setCookie($user_id, $time = 180)
    {
        setcookie($this->cookieKey, $user_id, time() + $time, "/");
    }

    private function redirect($path)
    {
        header("Location: " . $path);
    }

    public function redirectIfNotAuthenticated($path)
    {
        if (!$this->checkLogin())
            $this->redirect($path);
    }

    public function redirectIfAuthenticated($path)
    {
        if ($this->checkLogin())
            $this->redirect($path);
    }

    public function user($id)
    {
        return $this->userService->getUserById($id);
    }

    public function login($login, $password)
    {
        if (!$this->validate($login)) {
            return false;
        }

        if (!$this->validate($password)) {
            return false;
        }
        // die($login);

        $userId = $this->getUser($login, $password);

        if (!$userId) {
            return false;
        }

        $this->setCookie($userId);

        $this->redirect("admin.php");
    }

    private function getUser($login, $password)
    {
        return $this->userService->getUserId($login, $password);
    }

    public function logout()
    {
        $this->setCookie(null, -1);

        $this->redirect("client.php");
    }

    public function checkLogin()
    {
        if (isset($_COOKIE[$this->cookieKey]) && is_numeric($_COOKIE[$this->cookieKey])) {
            return true;
        }

        return false;
    }

    private function validate($value): bool
    {
        if (is_null($value)) {
            return false;
        }

        if (strlen($value) < 4) {
            return false;
        }
        return true;
    }

    public function __toString()
    {
        return $this->checkLogin();
    }
}
