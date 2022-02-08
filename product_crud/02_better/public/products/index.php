<?php
    /** @var $pdo \PDO */

    require_once "../../database.php";
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

<?php include_once "../../views/partials/header.php";?>

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

<table class="table table-striped">
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
            <td><img src="/<?php echo $product['image'] ?>" style="width: 50px;" /></td>
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