<?php

use ScandiwebApp\classes\Book;
use ScandiwebApp\classes\DVD;
use ScandiwebApp\classes\Furniture;
use ScandiwebApp\classes\Product;

$title = 'Product List';
include(__DIR__ . '/shared/header.php');
$productsAsArray = Product::getAll();
$products = [];

foreach ($productsAsArray as $product) {
    if (isset($product['size'])) {
        $dvd = new DVD($product);
        $products[] = $dvd;
    } else if (isset($product['weight'])) {
        $book = new Book($product);
        $products[] = $book;
    } else {
        $furniture = new Furniture($product);
        $products[] = $furniture;
    }
}

?>
<div class="content" id='product_list'>
    <span class="error-message"></span>

    <?php foreach ($products as $product) { ?>
        <div class="card">
            <input type="checkbox" name="deleteProduct" value="<?= $product->getId() ?>" class="delete-checkbox" />
            <div class="card-content">
                <h4 class="card-title"><?= $product->getSku() ?></h4>
                <p class="card-text"><?= $product->getName() ?></p>
                <p class="card-text"><?= $product->getPrice() ?> $</p>
                <p class="card-text">
                    <?php
                    echo str_contains($product->getClass(), "Book") ? "Weight: " . $product->getWeight() . "KG" : '';
                    echo str_contains($product->getClass(), "DVD") ?  "Size: " . $product->getSize() . " MB" : '';
                    echo str_contains($product->getClass(), "Furniture")  ? "Dimensions: " . $product->getDimensions() : '';
                    ?>
                </p>
            </div>
        </div>
    <?php } ?>

</div>

<?php
include(__DIR__ . '/shared/footer.php');
?>
<script src='../js/list.js'></script>
</body>

</html>