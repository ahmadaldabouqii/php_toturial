<?php
    /** @var $pdo \PDO */

    require_once "../../database.php";
    require_once "../../functions.php";

    $id = $_GET['id'] ?? null;
    if (!$id) {
        header('Location: index.php');
        exit;
    }

    $statement = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $statement->bindValue(':id', $id);
    $statement->execute();
    $product = $statement->fetch(PDO::FETCH_ASSOC);

    $errors = array();

    $title       = $product['title'];
    $price       = $product['price'];
    $description = $product['description'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once "../../validate_product.php";

        if (empty($errors)) {
            $statement = $pdo->prepare("UPDATE products SET title = :title,
             description = :description, image = :image, price = :price WHERE id = :id");

            $statement->bindValue(':title', $title);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':image', $imagePath);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':id', $id);
            $statement->execute();

            header('Location: index.php');
        }
    }
?>

<?php include_once "../../views/partials/header.php";?>

<a href="index.php" class="headBtn btn btn-secondary">Go Back To Products</a>
<h1>Update product <b><?php echo $product['title'] ?></b></h1>
<?php include_once "../../views/products/form.php"?>

</body>

</html>