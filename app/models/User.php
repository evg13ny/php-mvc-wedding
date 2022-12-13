<?php

class User
{
    use Model;

    protected $table = "users";

    protected $allowedColumns = [
        "username",
        "email",
        "password",
    ];

    public function validate($data, $id = null)
    {
        $this->errors = [];

        if (empty($data["email"])) {
            $this->errors["email"] = "Email is required";
        } elseif (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            $this->errors["email"] = "Email is not valid";
        } elseif ($this->first(["email" => $data["email"]], ["id" => $id])) {
            $this->errors["email"] = "Email is already in use";
        }

        if (!$id && empty($data["password"])) $this->errors["password"] = "Password is required";

        if (empty($data["username"])) {
            $this->errors["username"] = "Username is required";
        } elseif (!preg_match("/^[a-zA-Z0-9-_.]+$/", $data["username"])) {
            $this->errors["username"] = "There are wrong symbols in the username";
        }

        if (empty($this->errors)) return true;

        return false;
    }

    public function authenticate($row)
    {
        $_SESSION["USER"] = $row;
    }

    public function logout()
    {
        if (!empty($_SESSION["USER"])) unset($_SESSION["USER"]);
    }

    public function logged_in()
    {
        return !empty($_SESSION["USER"]) ? true : false;
    }

    public function create_table()
    {
        $query = "CREATE TABLE IF NOT EXISTS users (
            id INT PRIMARY KEY AUTO_INCREMENT,
            username VARCHAR(30) NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(100) NOT NULL,

            KEY email (email)
        )";

        $this->query($query);
    }
}
