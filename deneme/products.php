<?php

include 'connection.php';

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

    <title>Ürünler</title>
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
                <li class="nav-item">
                        <a class="nav-link" href="../blueflamesomine/blueflame/index.php">Siteye Git</a>
                    </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">

    <a href="productadd.php">

        <button type="button" class="btn btn-primary my-5 col-md-12">Yeni Ürün Ekle</button>

    </a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Sıra No</th>
            <th scope="col">Ürün Adı</th>
            <th scope="col">Ürün Fiyatı</th>
            <th scope="col">Ürün Açıklaması</th>
            <th scope="col">Ürün Fotoğrafı</th>
            <th scope="col">Ürün Kategorisi</th>
            <th scope="col">İşlemler</th>
        </tr>
        </thead>
<!--        <tbody>-->


        <?php
        $rows = $db -> query("SELECT category.*,products.* FROM products inner join category on category.category_id=products.category_id",PDO::FETCH_ASSOC);
        $count=0;

       foreach ($rows as $row){
           $count++;
//print_r($row);

            ?>

            <tr>
                <td><?= $count ?></td>
                <td><?= $row['product_name'] ?></td>
                <td><?= $row['product_price'] ?> $</td>
                <td><?= $row['product_description'] ?></td>
                <td><img src="uploads/<?= $row['product_image'] ?>" alt="" width="94"></td>
                <td><?= $row['category_name'] ?></td>
                <td>
                    <a href="productupdate.php?product_id=<?= $row['product_id'] ?>">
                        <button type="button" class="btn btn-outline-primary">Güncelle</button>
                    </a>
                    <a href="delete.php?action=productDelete&product_id=<?= $row['product_id'] ?>">
                        <button type="button" class="btn btn-outline-danger">Sil</button>
                    </a>
                </td>

            </tr>

            <?php
        }
        ?>


</div>


<!-- Option 1: Bootstrap Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>