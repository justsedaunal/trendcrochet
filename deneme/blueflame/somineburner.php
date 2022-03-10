<?php 

include "../kurCekme.php";

include 'header.php';
$id=4;

$rows = $db->query("SELECT * FROM products where category_id=$id",PDO::FETCH_ASSOC);
$rows->execute();



// foreach ($rows as $row) {
//     print_r($row);
// }


?>

<section class="container m-auto">

    <div class="row row-sm g-3  ">

        <?php

        


    foreach ($rows as $row) {



                ?>

        <div class="col-6 col-md-4 col-lg-3 col-xl-3 mx-3 ">
            <form method="post" enctype="multipart/form-data" action="cart.php">
                <div class="card mt-3  " >
                    <img src="../../blueflamesomine/uploads/<?= $row['product_image'] ?>" class="card-img-top" height="180" width="286" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['product_name'] ?> - </h5>
                        <!-- <h5 class="card-text text-primary"> <?= $take['category_name'] ?> </h5> -->
                        <!-- <p class="card-text"><?= $row['product_description'] ?></p> -->
                        <p class="text-primary"> <?= $row['product_price'] *$dolar?> TL</p>
                     <a href="" class="btn btn-primary">Hemen Al</a>
                    </div>
                </div>
            </form>
        </div>
        <?php
        } ?>

    </div>
</section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>