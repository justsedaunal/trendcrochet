<?php 

include 'header.php';
include "../kurCekme.php";
$id=3;

$rows = $db ->query("SELECT * FROM products where category_id =$id",PDO::FETCH_ASSOC);
$rows->execute();
//print_r($rows);




?>



<section class="container mt-3">
    <div class="row">
         <?php foreach ($rows as $row) {?> 
        <div class="col-lg3 mx-3">
            <div class="card" style="width: 18rem;">
            <img src="../../blueflamesomine/uploads/<?= $row['product_image'] ?>" class="card-img-top" height="180" width="286" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> <?= $row['product_name'] ?> </h5>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p> -->
                        <p class="text-primary"> <?= $row['product_price']*$dolar ?> TL</p>
                     <a href="" class="btn btn-primary">Hemen Al</a>                </div>
            </div>
        </div>
        <?php }?> 
    </div>
</section>