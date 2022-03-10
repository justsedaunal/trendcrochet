<?php 

 session_start();
// print_r($_SESSION); exit();

// if($_GET) {


//     $urun = ["product_image"=>$_GET["product_image"],
//              "product_price"=>$_GET["product_price"],
//             //  "quantity"=>1
//             ];
// print_r($urun); exit();
// }

    // if ($_GET) {
    //     $product_name = $_GET['product_name'];

      
    //     $urun = array (
    //         "product_name" => $product_name,
    //         "quantity" =>1
    //     ); 


    //     print_r( $_SESSION["urunListesi"][$_GET['product_name']]=$urun  ) ;
        //header('Location:index.php');
        
    // }
    
      //session_unset();
/*    sepete ekle işlem session start*/
    //session_unset();
include "../kurCekme.php";

include 'header.php';


$rows = $db->query("SELECT * FROM products",PDO::FETCH_ASSOC);
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
            <form method="post" enctype="multipart/form-data" action="shopping-cart.php?action=addcart">
                <div class="card mt-3  ">
                    <img name="product_image" src="../../blueflamesomine/uploads/<?= $row['product_image'] ?>" class="card-img-top"
                        height="180" width="286" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['product_name'] ?> - </h5>
                        <!-- <h5 class="card-text text-primary"> <?= $take['category_name'] ?> </h5> -->
                        <!-- <p class="card-text"><?= $row['product_description'] ?></p> -->
                        <p name="product_price" class="text-primary"> <?= $row['product_price'] *$dolar?> TL</p>
                        <!-- <a href="sepet.php?action=sepetegonder&product_id=<?= $row['product_id'] ?>"
                            class="btn btn-primary">Hemen Al</a> -->

                            <button type="submit" class="btn btn-primary mt-4" >Hemen Al</button>

                    </div>
                </div>
                <input type="hidden" name="sku" value="<?php print $product['sku']?>">

            </form>
        </div>
        <?php
        } ?>

    </div>
</section>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->

<!-- Option 2: Separate Popper and Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>

</body>

</html>