<?php
    $servername = 'localhost';
    $username   = 'root';
    $password   = '';
    $db_name    = 'products_crud';

    $pdo = new PDO("mysql:host=$servername;port=3306;dbname=$db_name", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $errors = array();

    $title       = '';
    $price       = '';
    $description = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title       = $_POST['title'];
        $description = $_POST['description'];
        $price       = $_POST['price'];
        $date        = date('Y-m-d H:i:s');

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
            $imagePath = '';

            // Check if the image are uploaded
            $image = $_FILES["image"] ?? null;

            // if the image exist we need to save it to somewhere
            if ($image && $image['tmp_name']) {
                $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
                mkdir(dirname($imagePath));
                move_uploaded_file($image['tmp_name'], $imagePath);
            }

            $statement = $pdo->prepare("INSERT INTO products (title, description, image, price, create_date)
                VALUES (:title, :description, :image, :price, :date)
            ");

            $statement->bindValue(':title', $title);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':image', $imagePath);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':date', $date);

            $statement->execute();

            header('Location: index.php');
        }
    }

    function randomString($n) {
        $characters = '0123456789abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTWXYX';
        $str        = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $str .= $characters[$index];
        }
        return $str;
    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./app.css" rel="stylesheet" />
    <title>Products CRUD</title>
</head>

<body>
    <h1>Create new product</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
            <?php endforeach;?>
        </div>
    <?php endif;?>

    <form action="" method="POST" enctype="multipart/form-data">
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