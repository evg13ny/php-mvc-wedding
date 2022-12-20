<?php

class Rsvp_model
{
    use Model;

    protected $table = "rsvp";

    protected $allowedColumns = [
        "name",
        "email",
        "guests",
        "attending",
        "message",
        "date",
    ];

    public function validate($post_data, $id = null)
    {
        $this->errors = [];

        if (empty($post_data["name"])) {
            $this->errors["name"] = "A name is required";
        }

        if (empty($post_data["email"])) {
            $this->errors["email"] = "An email is required";
        }

        if (empty($post_data["message"])) {
            $this->errors["message"] = "Message is required";
        }


        if (empty($this->errors)) return true;

        return false;
    }

    public function create_table()
    {
        $query = "CREATE TABLE IF NOT EXISTS rsvp (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL,
            guests INT DEFAULT 1 NOT NULL,
            attending VARCHAR(1024) NULL,
            message TEXT NULL,
            date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL
        )";

        $this->query($query);
    }
}
