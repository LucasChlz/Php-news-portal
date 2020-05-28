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
            $news = $this->painelModel->listNews("","","");
            
            if(isset($_GET['loggout'])){$this->painelModel->loggout();}

            if(isset($_POST['register-news']))
            {
                $title = $_POST['title-news'];
                $img = $_FILES['image'];
                $content = $_POST['content-news'];
                $category = $_POST['news'];
                $slug_news = \Source\Util\Utility::generateSlug($title);

                $this->painelModel->createNews($title,$img,$content,$category,$slug_news);
            }

            if(isset($_GET['delete']))
            {
                $id = $_GET['delete'];
                $this->painelModel->deleteImg($id);

                $this->painelModel->delete("tb_news",$id);
                              
                header("Location: ".URL_PAINEL);
                die();
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
                $this->painelModel->delete("tb_category",$id);
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

    public function newsSingle($data)
    {
        if(!isset($_SESSION['log_start']))
        {
            header('Location: '.URL_INI);
            die();
        }else
        {
            $slugNews = $data['slugNews'];
            $categorysAll = $this->painelModel->listCategory(true,false,"");
            $newsSingle = $this->painelModel->listNews("WHERE slug_news = ?",$slugNews)->fetch();

            if(isset($_POST['edit-news']))
            {
                $title = $_POST['title-news'];
                $img = $_FILES['image'];
                $content = $_POST['content-news'];
                $category_name = $_POST['news'];
                $currentImg = $_POST['currentImg'];
                $slug_news = \Source\Util\Utility::generateSlug($title);
                $newId = $newsSingle['id'];

                $this->painelModel->editNews($title,$img,$content,$category_name,$slug_news,$newId,$currentImg);
            }
            
            include("source/views/painel/newsSingle.php");
        }
    }

}