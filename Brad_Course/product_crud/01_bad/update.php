<?php
    $servername = 'localhost';
    $username   = 'root';
    $password   = '';
    $db_name    = 'products_crud';
    $port       = 3306;

    $pdo = new PDO("mysql:host=$servername;port=$port;dbname=$db_name", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
        $title       = $_POST['title'];
        $description = $_POST['description'];
        $price       = $_POST['price'];

        if (!$title) {
            array_push($errors, 'Product title is required!');
        }

        if (!$price) {
            array_push($errors, 'Product price is required!');
        }

        if (!is_dir('images')) {
            mkdir('images');
        }

        if (empty($errors)) {
            $imagePath = $product['image'];
            $image     = $_FILES["image"] ?? null;

            if ($image && $image['tmp_name']) {
                if ($product['image']) {
                    unlink($product['image']);
                }
                $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
                mkdir(dirname($imagePath));
                move_uploaded_file($image['tmp_name'], $imagePath);
            }

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

    function randomString($n) {
        $str        = '';
        $characters = '0123456789abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTWXYX';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $str .= $characters[$index];
        }
        return $str;
    }

?>


<a href="index.php" class="headBtn btn btn-secondary">Go Back To Products</a>
<h1>Update product <b><?php echo $product['title'] ?></b></h1>

<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
    <div><?php echo $error ?></div>
    <?php endforeach;?>
</div>
<?php endif;?>

<form action="" method="POST" enctype="multipart/form-data">
    <?php if ($product['image']): ?>
    <img src="<?php echo $product['image'] ?>" class="update-image" />
    <?php endif;?>
    <div class="mb-3">
        <label>Product Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class=" mb-3">
        <label>Product Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
    </div>
    <div class="mb-3">
        <label>Product Description</label>
        <textarea class="form-control" name="description"><?php echo $description ?></textarea>
    </div>
    <div class="mb-3">
        <label>Product Price</label>
        <input type="number" name="price" step=".01" class="form-control" value="<?php echo $price ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>

</html>