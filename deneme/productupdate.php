<?php

include 'connection.php';
$product_id = $_GET['product_id'];
$select = $db->prepare("SELECT * FROM products where product_id=:product_id");
$select->bindparam('product_id',$product_id,PDO::PARAM_INT);
$select->execute();
$row = $select->fetch(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="tr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ürün Güncelle</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-blue bg-dark  ">
        <div class="container-fluid ">
            <!--        <a class="navbar-brand" href="#">Navbar</a>-->
            <!--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"-->
            <!--                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
            <!--            <span class="navbar-toggler-icon"></span>-->
            <!--        </button>-->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav ">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Ana Sayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="categories.php">Kategoriler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categoryadd.php">Kategori Ekle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Ürünler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productadd.php">Ürün Ekle</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-5">

        <form method="post" action="update.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Ürün Adı</label>
                <input type="text" class="form-control" placeholder="Ürün Adı" name="product_name"
                    value="<?= $row['product_name'] ?>">
            </div>

            <div class="mb-3">
                <label>Ürün Fiyatı</label>
                <input type="text" class="form-control" placeholder="Ürün Fiyatını Dolar Cinsinden Giriniz"
                    name="product_price" value="<?= $row['product_price'] ?>">
            </div>

            <div class="mb-3">
                <label>Ürün Açıklaması</label>
                <input type="text" class="form-control" placeholder="Ürün Açıklaması" name="product_description"
                    value="<?= $row['product_description'] ?>">
            </div>


            <div class="mb-3">
                <label for="formFile" class="form-label">Ürün Fotoğrafı</label>
                <input class="form-control" type="file" id="formFile" name="product_image">
            </div>


            <div class="col-md-3">
                <label for="validationDefault04" class="form-label">Kategoriler</label>
                <select class="form-select" id="validationDefault04" name="category_id">
                    <?php
                    
                    $categories = $db->query("SELECT * FROM category",PDO::FETCH_ASSOC);
                    foreach($categories as $category) {
              
                    ?>
                    <option <?php if($category['category_id']== $row['category_id']){
                        echo 'selected';
                    } ?> value="<?= $category['category_id']?>"> <?= $category['category_name'] ?></option>
                    <?php
                    }
                ?>
                </select>
                <input type="hidden" name="product_id" value="<?= $product_id ?>">

                <input type="hidden" name="old_image" value="<?= $row['product_image'] ?>">


            </div>


            <button type="submit" class="btn btn-primary mt-4" name="product_update">Güncelle</button>
        </form>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>

</html>