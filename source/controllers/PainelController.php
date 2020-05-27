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

            $categorysAll = $this->painelModel->listCategory(true,false,"");
            
            if(isset($_GET['loggout'])){$this->painelModel->loggout();}

            if(isset($_POST['register-news']))
            {
                $title = $_POST['title-news'];
                $img = $_FILES['image'];
                $content = $_POST['content-news'];
                $category = $_POST['news'];

                $this->painelModel->createNews($title,$img,$content,$category);
            }

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

            if(isset($_POST['edit-category']))
            {
                $name = $data['name'];
                $newSlug = \Source\Util\Utility::generateSlug($name);

                $this->painelModel->editCategory($name,$newSlug,$slugCategory);
            }

            $categorySingle = $this->painelModel->listCategory(false,true,$slugCategory);
            include("source/views/painel/categorySingle.php");
        }
    }

}