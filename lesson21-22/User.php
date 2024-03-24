<?php

require_once "../lesson21-22/Connection.php";

class User
{
    private PDO $pdo;
    private Connection $connection;

    public function __construct()
    {
        $this->connection = new Connection();
        $this->pdo = $this->connection->getConnection();
    }

    public function isUserExist(string $login, string $password)
    {
        $query = $this->pdo->prepare('select * from Users where login = :login and password = :password');
        $query->execute([':login' => $login, ':password' => $password]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
