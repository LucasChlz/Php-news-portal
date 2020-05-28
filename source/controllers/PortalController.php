<?php

namespace Source\Controllers;

class PortalController
{

    public $painelModel;
    public $portalModel;

    public function __construct()
    {
        $this->painelModel = new \Source\Models\PainelModel;
        $this->portalModel = new \Source\Models\PortalModel;
    }

    public function home()
    {
        $allNews = $this->portalModel->listNewsHome(false,"","");
        $allCategorys = $this->painelModel->listCategory(true,false,"");

        if(isset($_POST['search_news']))
        {
            $title_search = $_POST['title_search'];
            $category_search = $_POST['news_search'];
            $allNews = $this->portalModel->listNewsHome(true,$title_search,$category_search);
        }
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