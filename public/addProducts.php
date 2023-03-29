    <?php

    $title = 'Product Add';
    include(__DIR__ . '/shared/header.php');
    ?>
    <form id="product_form" method="POST">
        <div class="input_container">
            <label for="sku">SKU</label>
            <input type="text" name="sku" id="sku" maxlength="10" placeholder="SKU1234567" title="SKU" required />
        </div>

        <div class="input_container">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" maxlength="50" placeholder="Product Name" title="Name" required />
        </div>

        <div class="input_container">
            <label for="price">Price ($)</label>
            <input type="number" name="price" id="price" placeholder="0,0" title="Price" pattern="[0-9]+([,\.][0-9]+)?" step="0.01" required />
        </div>

        <div class="input_container">
            <label for="productType">Type Switcher</label>
            <select name="productType" id="productType" title="Select a product" required>
                <option value="" selected="selected" hidden="hidden">Select a product</option>
                <option value="dvd" id='DVD'>DVD</option>
                <option value="book" id='Book'>Book</option>
                <option value="furniture" id='Furniture'>Furniture</option>
            </select>
        </div>

        <div class="dvd_container input_container">
            <label for="size">Size (MB)</label>
            <input type="number" name="size" id="size" title="Size" placeholder="0" pattern="[0-9]" step="1" />
            <span class="attribute-description">Please, provide size</span>
        </div>

        <div class="furniture_container">
            <span class="input_container">
                <label for="height">Heigh (CM)</label>
                <input type="number" name="height" id="height" placeholder="0" title="Heigh" step="1" />
            </span>
            <span class="input_container">
                <label for="width">Width (CM)</label>
                <input type="number" name="width" id="width" placeholder="0" title="Width" step="1" />
            </span>
            <span class="input_container">
                <label for="length">Length (CM)</label>
                <input type="number" name="length" id="length" placeholder="0" title="Length" step="1" />
            </span>
            <span>Please, provide dimensions</span>
        </div>

        <div class="book_container input_container">
            <label for="weight">Weight (KG)</label>
            <input type="number" name="weight" id="weight" placeholder="0" pattern="[0-9]+([,\.][0-9]+)?" step="0.01" title="Weight" />
            <span class="attribute-description">Please, provide weight</span>
        </div>
        <span class="error-message"></span>
    </form>

    <?php
    include(__DIR__ . '/shared/footer.php');
    ?>
    <script src='../js/add.js'></script>
    </body>

    </html>