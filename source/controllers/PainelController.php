<?php

namespace Source\Controllers;

class PainelController
{
    public function __construct()
    {
      
    }

    public function home()
    {
        include("source/views/painel/home.php");
    }
}