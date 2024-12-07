<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        return "Welcome to LifeSync!";
    }

    public function about()
    {
        return "This is the LifeSync about page.";
    }
}