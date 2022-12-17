<?php

class Story_model
{
    use Model;

    protected $table = "story";

    protected $allowedColumns = [
        "image",
        "title",
        "description",
        "date",
        "list_order",
    ];

    public function validate($fles_data, $post_data, $id = null)
    {
        $this->errors = [];

        $allowed_type = [
            "image/jpeg",
            "image/png",
            "image/gif",
            "image/webp",
        ];

        if (!$id) {
            if (empty($fles_data["image"]["name"])) {
                $this->errors["image"] = "An image is required";
            } else {
                if (!in_array($fles_data["image"]["type"], $allowed_type)) {
                    $this->errors = "Wrong image format. Please select an image from one of the next formats: " . implode(", ", $allowed_type);
                }
            }
        } else {
            if (!empty($fles_data["image"]["name"])) {
                if (!in_array($fles_data["image"]["type"], $allowed_type)) {
                    $this->errors = "Wrong image format. Please select an image from one of the next formats: " . implode(", ", $allowed_type);
                }
            }
        }

        if (empty($post_data["title"])) {
            $this->errors["title"] = "Title is required";
        }

        if (empty($post_data["description"])) {
            $this->errors["description"] = "Description is required";
        }

        if (empty($this->errors)) return true;

        return false;
    }

    public function create_table()
    {
        $query = "CREATE TABLE IF NOT EXISTS story (
            id INT PRIMARY KEY AUTO_INCREMENT,
            title VARCHAR(100) NOT NULL,
            description TEXT NOT NULL,
            date DATE NULL,
            image VARCHAR(1024) NULL,
            list_order INT DEFAULT 0
        )";

        $this->query($query);
    }
}
