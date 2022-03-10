<?php

include 'connection.php';


/************   kategori ekleme  operasyonu           ***************/
if(isset($_POST['categoryadd'])) {
    
    $category_name = $_POST["category_name"];


    $data = ["category_name" => $category_name];

    $insert = $db ->prepare("INSERT INTO category SET category_name=:category_name");

    $result = $insert ->execute($data);

    if($result) {
        echo 'kayıt başarılı. <a href="categories.php">kategorilere gitmek için tıklayın.</a>' ;
    } else {
        echo 'kayıt başarısız.';
    }

    


}




/************   ürün ekleme  operasyonu           ***************/



 if(isset($_POST['productadd'])) {

    $product_name = $_POST["product_name"]; 
    $product_price = $_POST["product_price"]; 
    $product_description = $_POST["product_description"] ; 
    $category_id = $_POST["category_id"];

    /******** dosya yükleme *******/ 

    $product_image = $_FILES["product_image"]; 
    $uniqueName = rand(100, 10000);
    $image=$uniqueName.$product_image['name'];
    move_uploaded_file($product_image['tmp_name'],"uploads/".$image);

 

  


     $data = ["product_name"=> $product_name,
              "product_price"=>$product_price,
              "product_description"=>$product_description,
              "product_image"=>$image,
              "category_id"=>$category_id];
    
    $insert = $db->prepare("INSERT INTO products SET 
                            product_name=:product_name, 
                            product_price=:product_price,
                            product_description=:product_description,
                            product_image=:product_image,
                            category_id=:category_id");

    $result = $insert ->execute($data);

         if($result) {
         echo 'kayıt başarılı. <a href="products.php">ürünlere gitmek için tıklayın.</a>' ;
     } else {
         echo 'kayıt başarısız.';
     }



 }

?>