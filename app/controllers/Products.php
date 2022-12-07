<?php

class Products
{
    use Controller;

    public function index()
    {
        echo "This is products controller";

        $this->view("products");
    }
}
