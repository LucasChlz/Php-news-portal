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

            $sql = \Source\Util\MySql::connect()->prepare("INSERT INTO `tb_category` VALUES (null,?,?) ");
            if($sql->execute(array($name,$slug)))
            {
                \Source\Util\Utility::alertJs("category successfully created");
            }
        }
    }
    
    public function listCategory()
    {
        $sql = \Source\Util\MySql::connect()->prepare("SELECT * FROM `tb_category`");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function deleteCategory($id)
    {
        $sql = \Source\Util\MySql::connect()->prepare("DELETE FROM `tb_category` WHERE id = ?");
        $sql->execute(array($id));
    }

}