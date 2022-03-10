<?php     

include 'connection.php';

/*****ürün silme operasyonu */

 if($_GET['action']=='productDelete') {
$product_id = $_GET["product_id"];

$delete = $db ->prepare("DELETE FROM products where product_id=:product_id");
$delete->bindParam(':product_id', $product_id,PDO::PARAM_INT);
$result = $delete->execute();

if($result) {
    echo 'silme başarılı. <a href="products.php">ürünler gitmek için tıklayın.</a>' ;
} else {
    echo 'silme başarısız.';
}
 }

/*****kategori silme operasyonu */

if($_GET['action']=="categoryDelete") {

$category_id = $_GET["category_id"];

$delete = $db ->prepare("DELETE FROM category where category_id=:category_id");
$delete->bindParam(':category_id', $category_id,PDO::PARAM_INT);
$result = $delete->execute();

if($result) {
    echo 'silme başarılı. <a href="products.php">ürünlere gitmek için tıklayın.</a>' ;
} else {
    echo 'silme başarısız.';
}
}

?>