<?php

interface ConnectsToUser
{

    public function getUserId(string $login, string $password): int;
}

class MysqliUser extends MysqliDB
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
        $user = $stmt->fetch_assoc();

        $stmt->free_result();

        $this->instanceConnection()->close();

        if (empty($user))
            return false;

        if ($user["login"] !== $login)
            return "Invalid data";

        if ($user["password"] !== $password)
            return "Invalid data";

        return $user["id"];
    }


}
