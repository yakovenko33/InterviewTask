<?php

require_once(ROOT.'/models/ArticleModel.php');

class DefaultController
{
    public function homeAction()
    {
        $blog = new ArticleModel();
        $blog->insertValues($_POST);

        var_dump($_POST);
        return require_once(ROOT.'/template/home.php');
    }

    public function formAction()
    {

    }

    public function articleAction($id)
    {
        print_r("Hello World");
    }
}