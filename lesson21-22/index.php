<?php

require_once "../lesson21-22/Article.php";

session_start();

if (!isset($_SESSION['login'], $_SESSION['password'])) {
    echo "Доступ запрещен";
    return;
} else {
    echo "Hello, " . $_SESSION['login'];
    echo "<br>";
}

$article = new Article();
$articles = $article->getAllArticles();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="NewArticleForm.php">Добавить новую статью</a>
<br>
<?php
foreach ($articles as $article)
{
    echo "Title: " . $article['article_name'] . "<br>";
    echo "Description: " . $article['article_description'] . "<br>";
    echo "Body: " . $article['article_body'] . "<br>";
?>
    <a href="UpdateArticleForm.php?id=<?php echo $article['id']; ?>">Изменить статью</a>
    <br>
    <a href="DeleteArticleForm.php?id=<?php echo $article['id']; ?>">Удалить статью</a>
    <br>
    <?php

}
?>
</body>
</html>
