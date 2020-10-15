<?php 
    define('WP_USE_THEMES', false);
    require('wp-load.php');
    
    //categoryid to be replaced or added
    $categoryidtobeadded=$_GET["categoryid"];
    //set to 0 if you want to 1 if you want to append
    $iscategoryadded=0;


     
      $postid = $_GET["postid"];

if ( !get_post_status ( $postid ) ) {
        echo "Post id doesnt exist <br/>";
}
else {
echo "Post id " . $postid . "  exist <br/>";

if($iscategoryadded!=0) {
    
 

    $category_detail = get_the_category( $postid );
    
$categoryidold="";

foreach($category_detail as $item) {
    $categoryidold=$item->cat_id . ",";
}
$categoryidold=$categoryidold . $categoryidtobeadded;

//$categoryidoldarray = explode (",", $categoryidold);



$categoryidoldarray=array_map('intval', explode(',', $categoryidold));


    wp_set_object_terms( $postid, $categoryidoldarray, 'product_cat',true );

echo "Category " . $categoryidtobeadded . " Appended Successfuly to post #" . $postid . "<br/>";
}
else {
    

//$categoryidtobeaddedarray = explode (",",  $categoryidtobeadded);

$categoryidtobeaddedarray=array_map('intval', explode(',', $categoryidtobeadded));

    wp_set_object_terms( $postid, $categoryidtobeaddedarray, 'product_cat' );

echo "Category " . $categoryidtobeadded . " Replaced Successfuly to post #" . $postid . "<br/>";
}




$terms = get_the_terms ( $postid, 'product_cat' );
echo "<br/>Following categories are assigned (From wordpress database)<br/>";
foreach ( $terms as $term ) {
     $cat_id = $term->term_id . "(" . $term->name . ")<br/>";
     echo $cat_id;
}

 
}

?>
