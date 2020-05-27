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

                $_SESSION['logged'] = true;
                $_SESSION['id_user'] = $info['id'];
                $_SESSION['login'] = $info['login'];
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
    }

}