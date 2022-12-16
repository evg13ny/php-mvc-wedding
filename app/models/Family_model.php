<?php

class Family_model
{
    use Model;

    protected $table = "family";

    protected $allowedColumns = [
        "name",
        "title",
        "twitter_link",
        "facebook_link",
        "linkedin_link",
        "instagram_link",
        "image",
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

        if (empty($post_data["name"])) {
            $this->errors["name"] = "A name is required";
        }

        if (empty($post_data["title"])) {
            $this->errors["title"] = "A title is required";
        }

        if (empty($this->errors)) return true;

        return false;
    }

    public function create_table()
    {
        $query = "CREATE TABLE IF NOT EXISTS family (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(50) NOT NULL,
            title VARCHAR(50) NOT NULL,
            twitter_link VARCHAR(1024) NULL,
            facebook_link VARCHAR(1024) NULL,
            linkedin_link VARCHAR(1024) NULL,
            instagram_link VARCHAR(1024) NULL,
            image VARCHAR(1024) NULL,
            list_order INT DEFAULT 0
        )";

        $this->query($query);
    }
}
