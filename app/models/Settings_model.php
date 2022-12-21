<?php

class Settings_model
{
    use Model;

    protected $table = "settings";

    protected $allowedColumns = [
        "setting",
        "value",
        "type",
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
            if (empty($post_data["type"])) {
                $this->errors["type"] = "Type is required";
            }
        } else {
            if (!empty($fles_data["image"]["name"])) {
                if (!in_array($fles_data["image"]["type"], $allowed_type)) {
                    $this->errors["image"] = "Wrong image format. Please select an image from one of the next formats: " . implode(", ", $allowed_type);
                }
            }
        }

        if (empty($post_data["setting"])) {
            $this->errors["setting"] = "Setting is required";
        }

        if (empty($this->errors)) return true;

        return false;
    }

    public function create_table()
    {
        $query = "CREATE TABLE IF NOT EXISTS settings (
            id INT PRIMARY KEY AUTO_INCREMENT,
            setting VARCHAR(255) NOT NULL,
            value VARCHAR(255) NOT NULL,
            type VARCHAR(255) NOT NULL
        )";

        $this->query($query);
    }
}
