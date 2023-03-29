<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="../../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<header>
  <h1><?= $title ?></h1>
  <div class="button-container">
    <?php if ($title === 'Product List') { ?>
      <button><a href="add-product">ADD</a></button>
      <button id="delete-button" type="submit" form="product_list" value="Submit">MASS DELETE</button>
    <?php } ?>

    <?php if ($title === 'Product Add') { ?>
      <button id="save-button" type="submit" form="product_form" value="Submit">Save</button>
      <button><a href="/">Cancel</a></button>
    <?php } ?>
  </div>
</header>