<?php

interface ConnectsToUser
{
    public function getUserId(string $login, string $password): int;
    public function getUserById(string $id): int;
}

class User extends DB implements ConnectsToUser
{
    /**
     * @param srting $login
     * @param srting $password
     * @return int
     */
    public function getUserId(string $login, string $password): int
    {
        $usersQuery = "SELECT * FROM users WHERE login = '{$login}'  ORDER BY 'login'  LIMIT 1";
        $stmt = $this->instanceConnection()->query($usersQuery);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($user))
            return false;

        if ($user["login"] !== $login)
            return "Invalid data";

        if ($user["password"] !== $password)
            return "Invalid data";

        return $user["id"];
    }

    /**
     * @param srting $id
     * @return int
     */
    public function getUserById($id): int
    {
        $id = $_COOKIE[$this->cookieKey];
        $usersQuery = "SELECT * FROM users WHERE id = '{$id}' LIMIT 1";
        $stmt = $this->conn->query($usersQuery);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user["id"];
    }
}
