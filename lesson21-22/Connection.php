<?php

class Connection
{

    public function getConnection(): PDO
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=News";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        return new PDO($dsn, 'root', '', $options);
    }
}
