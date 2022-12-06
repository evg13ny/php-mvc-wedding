<?php

class Products extends Controller
{
    public function index()
    {
        echo "This is products controller";

        $this->view("products");
    }
}
