<?php

namespace app;

use app\models\Product;
use PDO;

class Database {
    // I'm telling that $pdo variable is instance of \PDO
    public \PDO $pdo;

    public static Database $db;

    public function __construct() {
        $servername = 'localhost';
        $username   = 'root';
        $password   = '';
        $db_name    = 'products_crud';

        $this->pdo = new PDO("mysql:host=$servername;port=3306;dbname=$db_name", $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        self::$db = $this;
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

    public function createProduct(Product $product) {
        $statement = $this->pdo->prepare("INSERT INTO products (title, description, image, price, create_date)
                VALUES (:title, :description, :image, :price, :date)
            ");

        $statement->bindValue(':title', $product->title);
        $statement->bindValue(':description', $product->description);
        $statement->bindValue(':image', $product->imagePath);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));
        $statement->execute();
    }

    public function updateProduct(Product $product) {
        $statement = $this->pdo->prepare("UPDATE products SET title = :title,
             description = :description, image = :image, price = :price WHERE id = :id");

        $statement->bindValue(':title', $product->title);
        $statement->bindValue(':description', $product->description);
        $statement->bindValue(':image', $product->imagePath);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':id', $product->id);
        $statement->execute();
    }

    public function getProductById($id) {
        $statement = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteProduct($id) {
        $statement = $this->pdo->prepare("DELETE FROM products WHERE id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}