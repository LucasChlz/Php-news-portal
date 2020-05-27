<?php

namespace Source\Controllers;

class PainelController
{

    public $painelModel;

    public function __construct()
    {
        $this->painelModel = new \Source\Models\PainelModel;
    }

    public function home($data)
    {
        if(isset($_SESSION['logged']))
        {
            if(isset($_GET['loggout'])){$this->painelModel->loggout();}

            include("source/views/painel/home.php");

        }else{

            if(isset($_POST['action']))
            {
                $login = $_POST['login'];
                $password = $_POST['password'];

                $this->painelModel->login($login,$password);
            }

            include("source/views/painel/login.php");
        }
    }

    public function category($data)
    {
        if(!isset($_SESSION['logged']))
        {
            header('Location: '.URL_INI);
            die();

        }else{
            include("source/views/painel/category.php");
        }
    }
}