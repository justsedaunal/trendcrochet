<?php 
    include 'connection.php';



/*********  kategori güncelleme operasyonu ************/

if(isset($_GET['categoryupdate'])) {
    
    $category_name = $_GET["category_name"];
    $category_id = $_GET["category_id"];
  



    $data = ["category_name" => $category_name,
             "category_id"   => $category_id];

    $update = $db ->prepare("UPDATE category SET category_name=:category_name where category_id=:category_id");

    $result = $update ->execute($data);

    if($result) {
        echo 'güncelleme başarılı. <a href="categories.php">kategorilere gitmek için tıklayın.</a>' ;
    } else {
        echo 'güncelleme başarısız.';
    }


}

/*********  ürün güncelleme operasyonu ************/


if(isset($_POST['product_update'])) {

 

    $product_name = $_POST["product_name"]; 
    $product_price = $_POST["product_price"]; 
    $product_description = $_POST["product_description"] ; 
    $category_id = $_POST["category_id"];
    $product_id = $_POST["product_id"];

    /******** dosya güncelleme *******/       
if (($_FILES['product_image']['name'])) {

        /******** dosya silme *******/       
    $old_image ="uploads/".$_POST['old_image']; 
    unlink($old_image);

    /******** dosya yükleme *******/       
    $product_image = $_FILES["product_image"]; 
    $uniqueName = rand(100, 10000);
    $new_image=$uniqueName.$product_image['name'];
    move_uploaded_file($product_image['tmp_name'],"uploads/".$new_image);

    }



     $data = ["product_name"=> $product_name,
              "product_price"=>$product_price,
              "product_description"=>$product_description,
              "product_image"=>$new_image,
              "category_id"=>$category_id,
              "product_id" =>$product_id];
    
    $update = $db->prepare("UPDATE products SET 
                            product_name=:product_name, 
                            product_price=:product_price,
                            product_description=:product_description,
                            product_image=:product_image,
                            category_id=:category_id where product_id=:product_id");

    $result = $update ->execute($data);

         if($result) {
         echo 'güncelleme başarılı. <a href="products.php">ürünlere gitmek için tıklayın.</a>' ;
     } else {
         echo 'güncelleme başarısız.';
     }



 }
?>