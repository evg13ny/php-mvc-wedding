<?php

class Home
{
    use Controller;

    public function index()
    {
        echo "This is home controller";

        $this->view("home");
    }
}
