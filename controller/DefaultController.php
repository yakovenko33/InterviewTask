<?php

use Jenssegers\Blade\Blade;

require_once(ROOT.'/models/ArticleModel.php');

class DefaultController
{
    public function homeAction()
    {
        $blog = new ArticleModel();
        if(!empty($_POST)) {
            $blog->insertArticle($_POST);
        }

        $articles = $blog->getArticles();// вывод информации

        return require_once(ROOT.'/views/home.php');
    }

    public function articleAction($id = null)
    {
        if($id) {
            $blog = new ArticleModel();
            $article = $blog->getArticle($id);
        }

        return require_once(ROOT.'/views/article.php');
    }
}