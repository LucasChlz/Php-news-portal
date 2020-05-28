<?php

namespace Source\Models;

class PortalModel
{
    public function searchBar($title,$category)
    {
        if($category == "all")
        {
            return "WHERE title LIKE '%$title%' ";
        }else {
            return "WHERE title LIKE '%$title%' AND category_name = ? ";
        }
    }

    public function listNewsHome($search,$title,$category)
    {
        if($search == true)
        {
            if($category == "all")
            {
                $sql = \Source\Util\MySql::connect()->prepare("SELECT * FROM `tb_news` WHERE title LIKE '%$title%'");
                $sql->execute();
                return $sql->fetchAll();
            }else{
                $sql = \Source\Util\MySql::connect()->prepare("SELECT * FROM `tb_news` WHERE title LIKE '%$title%' AND category_name = ?");
                $sql->execute(array($category));
                return $sql->fetchAll();
            }
        }else{
            $sql = \Source\Util\MySql::connect()->prepare("SELECT * FROM `tb_news`");
            $sql->execute();
            return $sql->fetchAll();
        }
    }
}