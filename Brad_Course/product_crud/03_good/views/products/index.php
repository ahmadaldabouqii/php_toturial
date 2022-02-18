<h1>Product List</h1>

<a href="/products/create" class="btn-create btn btn-success">Create Product</a>

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
            <th scope="col">#</th>
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
            <td><?php if ($product['image']): ?>
                    <img src="/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" />
                <?php endif; ?>
            </td>
            <td><?php echo $product['title'] ?></td>
            <td><?php echo $product['price'] ?></td>
            <td><?php echo $product['create_date'] ?></td>
            <td>
                <a href="/products/update?id=<?php echo $product['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                <form action="/products/delete" method="POST" style="display: inline-block;">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>" />
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>