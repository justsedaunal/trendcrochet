<?php

include "connection.php";
include 'header.php';



// $categories = $db->query("SELECT * FROM category",PDO::FETCH_ASSOC);
// $categories->execute();
// foreach ($categories as $category) {
//     print_r($category);
// }





$category_id = $_GET['category_id'];
$rows = $db ->query("SELECT * FROM products where category_id=$category_id",PDO::FETCH_ASSOC);
$rows->execute();
// foreach($rows as $row) {
//     print_r($row);
//  exit();}
?>


<section class="container mt-3">
    <div class="row">
         <?php foreach ($rows as $row) { ?> 
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
        <?php } ?> 
    </div>
</section>



