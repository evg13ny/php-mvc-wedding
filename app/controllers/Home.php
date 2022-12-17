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

        $family = new Family_model;
        $family->order_type = "ASC";
        $family->order_column = "list_order";
        $data["family"] = $family->findAll();

        $story = new Story_model;
        $story->order_type = "ASC";
        $data["stories"] = $story->findAll();

        $about = new About_model;
        $about->order_type = "ASC";
        $data["about"] = $about->findAll();

        $this->view("home", $data);
    }
}
