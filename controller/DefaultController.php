<?php

require_once(ROOT.'/models/ArticleModel.php');

class DefaultController
{

    /*
     * Include views(home.php). Show all Articles and show top Articles. Add new Articles;
     *
     */
    public function homeAction()
    {
        $blog = new ArticleModel();

        if(!empty($_POST)) {
            $blog->addArticle($_POST);
        }

        $articles = $blog->getArticles();
        $top = $blog->getTopArticle();

        return require_once(ROOT.'/views/home.php');
    }

    /*
     * Include views(article.php), show all Article and add comment;
     *
     */
    public function articleAction($id = null)
    {
       if($id) {
            $blog = new ArticleModel();
            $article = $blog->getArticle($id);
            if(!empty($_POST['name'])) {
                $blog->setComment($_POST,$id);
            }

            $commets = $blog->getComment($id);
       }

        return require_once(ROOT.'/views/article.php');
    }
}