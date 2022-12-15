<?php

class Gallery_model
{
    use Model;

    protected $table = "gallery";

    protected $allowedColumns = [
        "image",
    ];

    public function validate($data, $id = null)
    {
        $this->errors = [];

        $allowed_type = [
            "image/jpeg",
            "image/png",
            "image/gif",
            "image/webp",
        ];

        if (empty($data["image"]["name"])) {
            $this->errors["image"] = "An image is required";
        } else {
            if (!in_array($data["image"]["type"], $allowed_type)) {
                $this->errors = "Wrong image format. Please select an image from one of the next formats: " . implode(", ", $allowed_type);
            }
        }

        if (empty($this->errors)) return true;

        return false;
    }

    public function create_table()
    {
        $query = "CREATE TABLE IF NOT EXISTS gallery (
            id INT PRIMARY KEY AUTO_INCREMENT,
            image VARCHAR(1024) NOT NULL
        )";

        $this->query($query);
    }
}
