<?php
    $servername = 'localhost';
    $username   = 'root';
    $password   = '';
    $db_name    = 'products_crud';

    $pdo = new PDO("mysql:host=$servername;port=3306;dbname=$db_name", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $search = $_GET['search'] ?? '';

    if ($search) {
        $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date ASC');
        $statement->bindValue(':title', "%$search%");

    } else {
        $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date ASC');
    }

    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Products CRUD</title>
    <link href="../style/style.css" rel="stylesheet" />
</head>

<body>
    <h1>Products CRUD</h1>

    <a href="create.php" class="btn-create btn btn-success">Create Product</a>

    <form>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search for products" name="search"
                value="<?php echo $search ?>">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>

    <table class="table table-striped"">
        <thead>
        <tr>
        <th scope=" col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Create Date</th>
        <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <th scope="row"><?php echo $product['id'] ?></th>
                <td><img src="<?php echo $product['image'] ?>" style="width: 50px;" /></td>
                <td><?php echo $product['title'] ?></td>
                <td><?php echo $product['price'] ?> </td>
                <td><?php echo $product['create_date'] ?> </td>
                <td>
                    <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                    <form action="delete.php" method="POST" style="display: inline-block;">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>" />
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>

</html>