<?php 
                                // $category_id = $_GET['category_id'];
                                $rows = $db ->query("SELECT * FROM category where parent_id=0 ",PDO::FETCH_OBJ)->fetch();
                                // print_r($rows[0]->category_name);  exit();
// echo count($rows); exit();
                                
                                
                                for ($i=0;$i<count($rows);$i++) { ?>
                                <li><a href="index.php?category_id=<?= $rows[$i][0] ?>"><?= $rows[$i][1] ?></a>
                                    <?php 

                                $category_id = $rows[$i][0];
                                $subcategory = $db ->query("SELECT * FROM category where parent_id=$category_id ",PDO::FETCH_NUM)->fetch();
                                 print_r($rows); 
                                echo count($subcategory); 


                                for ($i=0;$i<count($subcategory);$i++) { ?>
                                                                <li>
                                                                    <?= $subcategory[$i][1] ?>
                                                                </li>
                                                                <?php } ?>
                                                                </li>
                                                                <?php 
                                    }


?>