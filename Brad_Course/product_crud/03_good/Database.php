<?php

namespace app;
use PDO;

class Database {
    // I'm telling that $pdo variable is instance of \PDO
    public \PDO $pdo;

    public function __construct() {
        $servername = 'localhost';
        $username   = 'root';
        $password   = '';
        $db_name    = 'products_crud';

        $this->pdo = new PDO("mysql:host=$servername;port=3306;dbname=$db_name", $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function getProducts($search = '') {
        if ($search) {
            $statement = $this->pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date ASC');
            $statement->bindValue(':title', "%$search%");
        } else {
            $statement = $this->pdo->prepare('SELECT * FROM products ORDER BY create_date ASC');
        }
        $statement->execute();
       return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}