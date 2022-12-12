<?php

class Admin
{
    use Controller;

    public function index()
    {
        //redirect("login");

        $user = new User();

        $this->view("admin/dashboard");
    }

    public function users($action = "")
    {
        $user = new User();

        $data["action"] = $action;
        $data["rows"] = $user->findAll();

        if ($user->validate($_POST)) {
            $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $user->insert($_POST);
            redirect("admin/users");
        }

        $data["errors"] = $user->errors;

        $this->view("admin/users", $data);
    }
}
