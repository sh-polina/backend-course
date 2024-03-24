<?php

require_once "Article.php";

$article = new Article();

if (!empty($_GET)) {
    $article->deleteArticle($_GET['id']);
    header("Location: http://backend-course/lesson21-22/index.php");
    exit;
}