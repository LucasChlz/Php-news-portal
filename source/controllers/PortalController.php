<?php

namespace Source\Controllers;

class PortalController
{
    public function __construct()
    {

    }

    public function home()
    {
        include("source/views/home.php");
    }
}