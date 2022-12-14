<?php

class Contact_model
{
    use Model;

    protected $table = "contact_table";

    protected $allowedColumns = [
        "twitter_link",
        "facebook_link",
        "linkedin_link",
        "instagram_link",
        "email",
        "phone",
    ];

    public function validate($data, $id = null)
    {
        $this->errors = [];

        if (empty($this->errors)) return true;

        return false;
    }

    public function create_table()
    {
        $query = "CREATE TABLE IF NOT EXISTS contact_table (
            id INT PRIMARY KEY AUTO_INCREMENT,
            twitter_link VARCHAR(1024) NOT NULL,
            facebook_link VARCHAR(1024) NOT NULL,
            linkedin_link VARCHAR(1024) NOT NULL,
            instagram_link VARCHAR(1024) NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone VARCHAR(15) NOT NULL
        )";

        $this->query($query);

        $query = "INSERT INTO $this->table (twitter_link) VALUES ('')";

        $this->query($query);
    }
}
