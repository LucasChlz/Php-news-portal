<?php

namespace Source\Controllers;

class PainelController
{
    public function __construct()
    {
      
    }

    public function home()
    {
        if(isset($_SESSION['logged']))
        {
            include("source/views/painel/home.php");
        }else{
            include("source/views/painel/login.php");
        }
    }
}