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
        if(isset($_SESSION['log_start']))
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
        if(!isset($_SESSION['log_start']))
        {
            header('Location: '.URL_INI);
            die();

        }else{

            if(isset($_POST['register-news']))
            {
                $name = $data['name'];
                $slug = \Source\Util\Utility::generateSlug($name);
                $this->painelModel->createCategory($name,$slug);
            }

            if(isset($_GET['delete']))
            {
                $id = $_GET['delete'];
                $this->painelModel->deleteCategory($id);
            }

            $category = $this->painelModel->listCategory(true,false,"");

            include("source/views/painel/category.php");
        }
    }

    public function categorySingle($data)
    {
        if(!isset($_SESSION['log_start']))
        {
            header('Location: '.URL_INI);
            die();
        }else{

            $slugCategory = $data['slugCategory'];

            $categorySingle = $this->painelModel->listCategory(false,true,$slugCategory);
            include("source/views/painel/categorySingle.php");
        }
    }

}