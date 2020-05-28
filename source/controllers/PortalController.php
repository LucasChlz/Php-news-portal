<?php

namespace Source\Controllers;

class PortalController
{

    public $painelModel;

    public function __construct()
    {
        $this->painelModel = new \Source\Models\PainelModel;
    }

    public function home()
    {
        $allNews = $this->painelModel->listNews("","");
        include("source/views/home.php");
    }

    public function news($data)
    {
        $slugNews = $data['slugNews'];
        
        $currentNews = $this->painelModel->listNews("WHERE slug_news = ?",$slugNews); 
        if($currentNews->rowCount() == 0){
            header('Location: '.URL_INI);
            die();
        };

        $singleNews = $currentNews->fetch();

        include("source/views/news.php");
    }
}