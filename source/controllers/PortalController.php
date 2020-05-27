<?php

namespace Source\Controllers;

class PortalController
{
    public function __construct()
    {

    }

    public function portalHome()
    {
        include("source/views/home.php");
    }
}