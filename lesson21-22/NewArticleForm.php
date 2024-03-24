<?php
require_once "Article.php";

if (!empty($_POST)) {
    $article = new Article();
    $article->createArticle($_POST["title"], $_POST["description"], $_POST["body"]);

    header("Location: http://backend-course/lesson21-22/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="NewArticleForm.php" method="post">
  <input type="text" name="title" placeholder="Title" required>
  <input type="text" name="description" placeholder="Description" required>
  <input type="text" name="body" placeholder="Body" required>
  <button type="submit">Отправить</button>
</form>
</body>
</html>

