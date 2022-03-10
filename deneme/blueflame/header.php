<?php
 require_once 'connection.php';
 include "../kurCekme.php";
 include "functions.php";

 /***** category listing for recursive function start   ******/

  $category_list = $db->query("SELECT * FROM category",PDO::FETCH_OBJ)->fetchAll();

//  print_r(buildTree($category_list)) ;
 /***** category listing for recursive function end   ******/



?>


<!doctype html>
<html lang="tr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Blue Flame Şömine</title>
</head>

<body>
    <header>


        <!-- <div style="background-color: #e7e7e7">
            <div class="container">
                <section class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand " href="index.php" style="font-size:14px;">BLUEFLAME | ŞÖMİNE TUTKUDUR</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#" style="font-size:14px;">GİRİŞ YAP <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="font-size:14px;">ÜYE OL</a>
                            </li>

                        </ul>
                    </div>
                </section>






            </div>
        </div> -->

        <div style="background-color: #fff;">
            <div class="container">
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.php"><img
                                src="https://blueflamesomine.com/panel/uploads/settings_v/logo/blueflame.png"
                                width=250px; alt=""></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarSupportedContent">

                            <form class="d-flex px-3">
                                <input class="form-control me-2 " type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-success " type="submit">Search</button>

                            </form>


                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Üye Giriş</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Favorilerim</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="shopping-cart.php">Sepet</a>
                                </li>
                                <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li> -->

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div style="background-color: #2980b9;">
            <div class="container">

                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>


                        <div class="collapse navbar-collapse menu" id="navbarNavDropdown">

                            <!-- /*********** for loop for category li tags start   *******/ -->

                            <ul>
                                <?php 
                                $category_id=$_GET;
                                $sorgu = $baglanti->prepare("SELECT * FROM category WHERE category_id = $category_id");
                                $sorgu->bindParam(PDO::PARAM_INT);
                                $sorgu->execute();
                            
                                $rows = $sorgu->fetch(PDO::FETCH_ASSOC);                                // print_r($rows); exit();

                                foreach($rows as $row) { ?>

                                <!-- <li><a href="index.php?category_id=<?= $rows[$i][0] ?>"><?= $rows[$i][1] ?></a> -->
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page"
                                        href="index.php?category_id=<?= $row["category_id"] ?>"><?= $row["category_name"] ?></a>
                                </li>

                                <?php

}
                                                            
                                                                ?>



                            </ul>

                            <!-- /*********** for loop for category li tags end     *******/ -->

                            <!-- /****************foreach loop for categories and subcategories start******/ -->

                            <!-- <?php printTags(buildTree($category_list));  ?>  -->

                            <!-- /****************foreach loop for categories and subcategories end ******/ -->

                            <!-- <ul class="navbar-nav">

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="bioethanolsomine.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Bio Ethanol Şömineler 
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="categories.php?category_id=9">Duvar Tipi Şömineler</a></li>
            <li><a class="dropdown-item" href="categories.php?category_id=10">Masa Tipi Şömineler</a></li>
            <li><a class="dropdown-item" href="categories.php?category_id=11">Yer Tipi Şömineler</a></li>
          </ul>
        </li>


      
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="elektriklisomine.php">Elektrikli Şömineler</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php?category_id=3">3D Elektrikli Şömineler</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php?category_id=4">Şömine Burner</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php?category_id=5">Mumluklar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php?category_id=6">Saatler</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php?category_id=7">Bio Şömine Yakıtı</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php?category_id=8">Şömine Aksesuar</a>
        </li>
      
      </ul> -->
                        </div>
                    </div>
                </nav>
            </div>

        </div>

    </header>


    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://blueflamesomine.com/panel/uploads/slides_v/1970x500/bluflame-slider-1.jpg"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://blueflamesomine.com/panel/uploads/slides_v/1970x500/blueflame-slider-2.jpg"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://blueflamesomine.com/panel/uploads/slides_v/1970x500/bluflame-slider-1.jpg"
                    class="d-block w-100" alt="...">
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>