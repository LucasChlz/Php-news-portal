<?php

namespace Source\Models;

class PainelModel
{
    public function login($login,$password)
    {

        if($login == "" || $password == "")
        {
            \Source\Util\Utility::alertJs("insert all fields");
        }else {

            $sql = \Source\Util\MySql::connect()->prepare("SELECT * FROM `tb_users` WHERE login = ? AND password = ?");

            $sql->execute(array($login,$password));

            if($sql->rowCount() == 1)
            {
                $info = $sql->fetch();

                $_SESSION['log_start'] = true;
                $_SESSION['id_user'] = $info['id'];
                $_SESSION['login_user'] = $info['login'];
                $_SESSION['password'] = $info['password'];

                header('Location: '.URL_PAINEL);
                die();
            }
        }
    }

    public function loggout()
    {
        session_unset();
        session_destroy();
        header('Location: '.URL_INI);
        die();
    }

    public function createCategory($name,$slug)
    {

        if($name == "")
        {
            \Source\Util\Utility::alertJs("fill all fields");
        }else{
            
            $verify = \Source\Util\MySql::connect()->prepare("SELECT * FROM `tb_category` WHERE name = ? AND slug = ?");
            $verify->execute(array($name,$slug));
            if($verify->rowCount() == 1)
            {
                \Source\Util\Utility::alertJs("this category already exists");

            }else{

                $sql = \Source\Util\MySql::connect()->prepare("INSERT INTO `tb_category` VALUES (null,?,?) ");
                if($sql->execute(array($name,$slug)))
                {
                    \Source\Util\Utility::alertJs("category successfully created");
                }
            }
        }
        
    }
    
    public function listCategory($all,$fetchOne,$verify,$slugCategory)
    {
        if($all)
        {
            $sql = \Source\Util\MySql::connect()->prepare("SELECT * FROM `tb_category`");
            $sql->execute();
            return $sql->fetchAll();

        }else if($fetchOne)
        {
            $sql = \Source\Util\MySql::connect()->prepare("SELECT * FROM `tb_category` WHERE slug = ?");
            $sql->execute(array($slugCategory));
            return $sql->fetch();
        }else if($verify)
        {
            $sql = \Source\Util\MySql::connect()->prepare("SELECT * FROM `tb_category` WHERE slug = ?");
            $sql->execute(array($slugCategory));
            return $sql;
        }
    }

    public function delete($tb,$id)
    {
        $sql = \Source\Util\MySql::connect()->prepare("DELETE FROM `$tb` WHERE id = ?");
        $sql->execute(array($id));
    }

    public function deleteImg($id)
    {
        $del = $this->listNews("WHERE id = ?",$id);
        $delinfo = $del->fetch();

        return unlink(URL_DIR.'/views/Images/'.$delinfo['img']);

    }

    public function editCategory($name,$newSlug,$slugCategoria)
    {

        if($name == "" || $slugCategoria == "")
        {
            \Source\Util\Utility::alertJs("fill all fields");
        }else
        {   
            $verifyCategory = $this->listCategory(false,false,true,$slugCategoria);
            if($verifyCategory->rowCount() == 1)
            {
                \Source\Util\Utility::alertJs("this category already exists");
            }else
            {
                $sql = \Source\Util\MySql::connect()->prepare("UPDATE `tb_category` SET `name` = ?,`slug` = ? WHERE slug = ?");
    
                if($sql->execute(array($name,$newSlug,$slugCategoria)))
                {
                    header('Location: '.URL_PAINEL.'/category');
                    die();   
                }
            }
        }
    }

    public function createNews($title,$img,$content,$category_name,$slug_news)
    {

        if($title == "" || $img == "" || $content == "")
        {
            \Source\Util\Utility::alertJs("fill all fields");

        }else{

            if(\Source\Util\Utility::imgValidates($img) == false)
            {
                \Source\Util\Utility::alertJs("invalid image");
            }else{
                
                $verifyNews = $this->listNews("WHERE slug_news = ?",$slug_news);

                if($verifyNews->rowCount() == 1)
                {
                    \Source\Util\Utility::alertJs("this post already exists");
                }else{

                    $imgF = \Source\Util\Utility::uploadImg($img);
                    $date = date("Y-m-d");                    

                    $sql = \Source\Util\MySql::connect()->prepare("INSERT INTO `tb_news` VALUES (null,?,?,?,?,?,?) ");
                    if($sql->execute(array($title,$imgF,$content,$category_name,$slug_news,$date)))
                    {
                        header("Location: ".URL_PAINEL);
                        die();
                    }
                }
            }
        }
    }

    public function listNews($query,$param1)
    {
        if($query == "")
        {
            $sql = \Source\Util\MySql::connect()->prepare("SELECT * FROM `tb_news`");
            $sql->execute();
            
            return $sql->fetchAll();
        }else {
            $sql = \Source\Util\MySql::connect()->prepare("SELECT * FROM `tb_news` $query");
            $sql->execute(array($param1));
            return $sql;
        }
    }

    public function editNews($title,$img,$content,$category_name,$slug_news,$newsId,$currentImage)
    {
        $verifyNews = \Source\Util\MySql::connect()->prepare("SELECT * FROM `tb_news` WHERE id = ? ");
        $verifyNews->execute(array($newsId));
        if($verifyNews->rowCount() == 0)
        {
            \Source\Util\Utility::alertJs("this news does not exist");
        }else{

            if($title == "" || $content == "" || $category_name == "")
            {
                \Source\Util\Utility::alertJs("fill all fields");
            }
            if(\Source\Util\Utility::imgValidates($img)){  

            $this->deleteImg($newsId);
            $img = \Source\Util\Utility::uploadImg($img);
            $date = date("Y-m-d");

            $sql = \Source\Util\MySql::connect()->prepare("UPDATE `tb_news` SET `title` = ?, `img` = ?, `content` = ?, `category_name` = ?, `slug_news` = ?, `date` = ? WHERE `id` = ?");

            $verifyNews = \Source\Util\MySql::connect()->prepare("SELECT * FROM `tb_news`");
            $verifyNews->execute();

            if($verifyNews->rowCount() == 1)
            {
                \Source\Util\Utility::alertJs("this post already exists");
            }
            if($sql->execute(array($title,$img,$content,$category_name,$slug_news,$date,$newsId)))
            {
                header('Location: '.URL_PAINEL.'/news/edit/'.$slug_news);
                die();
            }

            }else{
                $img = $currentImage;
                $date = date("Y-m-d");

                $sql = \Source\Util\MySql::connect()->prepare("UPDATE `tb_news` SET `title` = ?, `img` = ?, `content` = ?, `category_name` = ?, `slug_news` = ?, `date` = ? WHERE `id` = ?");

                $verifyNews = \Source\Util\MySql::connect()->prepare("SELECT * FROM `tb_news`");
                $verifyNews->execute();
    
                if($verifyNews->rowCount() == 1)
                {
                    \Source\Util\Utility::alertJs("this post already exists");
                }
                if($sql->execute(array($title,$img,$content,$category_name,$slug_news,$date,$newsId)))
                {
                    header('Location: '.URL_PAINEL.'/news/edit/'.$slug_news);
                    die();
                }
            }
        }  
    }


}