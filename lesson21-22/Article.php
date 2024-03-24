<?php

require_once "../lesson21-22/Connection.php";

class Article
{
    private PDO $pdo;
    private Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection();
        $this->pdo = $this->connection->getConnection();
    }

    public function createArticle(string $title, string $description, string $body): void
    {
        $query = $this->pdo->prepare('insert into Articles(article_name, article_description, article_body) values (?,?,?)');
        $query->execute(array($title, $description, $body));
    }

    public function getAllArticles(): array
    {
        $query = $this->pdo->prepare('select * from Articles');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOneArticle(int $id): array
    {
        $query = $this->pdo->prepare('select * from Articles where id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateArticle(int $id, string $title, string $description, string $body): void
    {
        $query = $this->pdo->prepare('update Articles set article_name = ?, article_description = ?, article_body = ? where id = ?');
        $query->execute(array($title, $description, $body, $id));
    }

    public function deleteArticle(int $id): void
    {
        $query = $this->pdo->prepare('delete from Articles where id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
}