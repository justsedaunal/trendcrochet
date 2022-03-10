<?php 

function buildTree($items,$parentId=0){
    $branch = array ();
    foreach ($items as $item){
        if ($item->parent_id==$parentId) {
            $children  = buildTree($items,$item->category_id);
        
        if ($children) {
            $item->children =$children ;
        } else {
            $item->children =array();
        }

        $branch[]=$item;
        
    }
}
   return $branch;
    
}

function printTags ($tags) {
    echo "<ul>";

    foreach($tags as $tag) {

        echo "<li>" ."<a>. $tag->category_name. </a>" ."</li>";

        if(sizeof($tag->children) > 0) {

            printTags($tag->children);

        }
    }

    echo "</ul>";

}


?>