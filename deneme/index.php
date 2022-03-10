<?php

include 'connection.php';


/*-------------kur çekme------------------ */

include "kurCekme.php";

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Ana Sayfa</title>
</head>

<body>
    <nav class="navbar navbar-expand navbar-blue bg-dark  ">
        <div class="container-fluid ">
            <!--        <a class="navbar-brand" href="#">Navbar</a>-->
            <!--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"-->
            <!--                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
            <!--            <span class="navbar-toggler-icon"></span>-->
            <!--        </button>-->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav ">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Ana Sayfa</a>
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

    <div class="container ms-5 ">
        <form action="index.php">

            <div class="row mt-5 ms-5  container ">

                <?php


$rows = $db -> query("SELECT category.*,products.* FROM products inner join category on category.category_id=products.category_id",PDO::FETCH_ASSOC);
    
            foreach ($rows as $row) {

                // $price=intval($take['product_price'] * $USD );

                //  $total=number_format($price, 2,',','.');
                ?>


                <div class="col-sm-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= 'uploads/' .  $row['product_image'] ?>" class="card-img-top" height="180" width="286"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title" ><?= $row['product_name'] ?> </h5>
                            <h5 class="card-text text-primary"> <?= $row['category_name'] ?> </h5>

                            <p class="card-text"><?= $row['product_description'] ?></p>
                            <a href="#" class="btn btn-primary"> <?= $row['product_price']*$dolar ?> TL</a>
                            <!-- <a href="index.php?action=sepetegonder&id=<?= $take['id'] ?>"
                                class="btn btn-secondary">sepete ekle</a> -->
                        </div>
                    </div>
                </div>
                <?php }
         ?>
            </div>
        </form>

    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>

</html>