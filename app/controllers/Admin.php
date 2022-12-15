<?php

class Admin
{
    use Controller;

    public function index()
    {
        $user = new User();

        // $user->create_table();

        if (!$user->logged_in()) redirect("login");

        $this->view("admin/dashboard");
    }

    public function users($action = null, $id = null)
    {
        $user = new User();

        if (!$user->logged_in()) redirect("login");

        $data["action"] = $action;
        $data["rows"] = $user->findAll();

        if ($action == "add") {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($user->validate($_POST)) {
                    $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    $user->insert($_POST);
                    redirect("admin/users");
                }
            }
        } elseif ($action == "edit") {
            $data["row"] = $user->first(["id" => $id]);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($user->validate($_POST, $id)) {
                    if (empty($_POST["password"])) {
                        unset($_POST["password"]);
                    } else {
                        $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    }

                    $user->update($id, $_POST);
                    redirect("admin/users");
                }
            }
        } elseif ($action == "delete") {
            $data["row"] = $user->first(["id" => $id]);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $user->delete($id);
                redirect("admin/users");
            }
        }

        $data["errors"] = $user->errors;

        $this->view("admin/users", $data);
    }

    public function contact($action = null, $id = null)
    {
        $user = new User();
        $contact = new Contact_model();

        // $contact->create_table();

        if (!$user->logged_in()) redirect("login");

        $data["action"] = $action;
        $contact->limit = 1;
        $data["rows"] = $contact->findAll();

        if ($action == "edit") {
            $data["row"] = $contact->first(["id" => $id]);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($contact->validate($_POST, $id)) {
                    $contact->update($id, $_POST);
                    redirect("admin/contact");
                }
            }
        }

        $data["errors"] = $contact->errors;

        $this->view("admin/contact", $data);
    }

    public function gallery($action = null, $id = null)
    {
        $user = new User();
        $gallery = new Gallery_model;

        // $gallery->create_table();

        if (!$user->logged_in()) redirect("login");

        $data["action"] = $action;
        $data["rows"] = $gallery->findAll();

        if ($action == "add") {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($gallery->validate($_FILES)) {
                    $destination = $folder . time() . $_FILES["image"]["name"];
                    move_uploaded_file($_FILES["image"]["tmp_name"], $destination);
                    $_POST["image"] = $destination;
                    $gallery->insert($_POST);
                    redirect("admin/gallery");
                }
            }
        } elseif ($action == "edit") {
            $data["row"] = $gallery->first(["id" => $id]);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($gallery->validate($_FILES, $id)) {
                    $destination = $folder . time() . $_FILES["image"]["name"];
                    move_uploaded_file($_FILES["image"]["tmp_name"], $destination);
                    $_POST["image"] = $destination;
                    $gallery->update($id, $_POST);

                    if (file_exists($data["row"]->image)) {
                        unlink($data["row"]->image);
                    }

                    redirect("admin/gallery");
                }
            }
        } elseif ($action == "delete") {
            $data["row"] = $gallery->first(["id" => $id]);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $gallery->delete($id);

                if (file_exists($data["row"]->image)) {
                    unlink($data["row"]->image);
                }

                redirect("admin/gallery");
            }
        }

        $data["errors"] = $gallery->errors;

        $this->view("admin/gallery", $data);
    }
}
