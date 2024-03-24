<?php

require_once "Article.php";

$article = new Article();

if (!empty($_GET)) {
    $articles = $article->getOneArticle($_GET['id']);
}

if (!empty($_POST)) {
    $article->updateArticle($_POST["id"], $_POST["title"], $_POST["description"], $_POST["body"]);

    header("Location: http://backend-course/lesson21-22/index.php");
    exit;
}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Редактирование статьи</title>
    </head>
    <body>
    <form action="UpdateArticleForm.php" method="post">
        <input type="text" name="title" value="<?php echo $articles['article_name'] ?>" required>
        <input type="text" name="description" value="<?php echo $articles['article_description'] ?>" required>
        <input type="text" name="body" value="<?php echo $articles['article_body'] ?>" required>
        <input type="hidden" name="id" value="<?php echo $articles['id'] ?>" />
        <button type="submit">Отправить</button>
    </form>
    </body>
    </html>
