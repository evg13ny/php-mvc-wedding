<?php

class Home
{
    use Controller;

    public function index()
    {
        $contact = new Contact_model;
        $data["social_links"] = $contact->first(["id" => 1]);

        $gallery = new Gallery_model;
        $data["gallery"] = $gallery->findAll();

        $this->view("home", $data);
    }
}
