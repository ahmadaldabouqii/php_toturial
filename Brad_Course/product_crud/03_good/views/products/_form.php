<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach;?>
    </div>
<?php endif;?>

<form action="" method="POST" enctype="multipart/form-data">
    <?php if ($product['image']): ?>
        <img src="/<?php echo $product['image'] ?>" class="update-image" alt="product_image"/>
    <?php endif;?>

    <div class="mb-3">
        <label>Product Image</label>
        <input type="file" name="image" class="form-control" />
    </div>
    <div class=" mb-3">
        <label>Product Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $product['title'] ?>" />
    </div>
    <div class="mb-3">
        <label>Product Description</label>
        <textarea class="form-control" name="description"><?php echo $product['description'] ?></textarea>
    </div>
    <div class="mb-3">
        <label>Product Price</label>
        <input type="number" name="price" step=".01" class="form-control" value="<?php echo $product['price'] ?>" />
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>