<?php 
    define('WP_USE_THEMES', false);
    require('wp-load.php');
    
    //categoryid to be replaced or added
    $categoryidtobeadded=$_GET["categoryid"];
    //set to 0 if you want to 1 if you want to append
    $iscategoryadded=0;
    /*
    $url="http://dhinoj.co.in/dhinoj-mitra-mandal-ahmedabad-has-donated-rs-2500000-to-p-m-english-medium-school-for-its-10th-varshikotsav-annual-function/";
    */
    
     $url=$_GET["url"];
     
      $postid = url_to_postid( $url );
if($postid==0) {
        echo "Post id doesnt exist <br/>";
}
else {
echo "Post id " . $postid . "  exist <br/>";
$post_categories = wp_get_post_categories( $postid );
$categoryidold="";

foreach($post_categories as $item) {
    $categoryidold=$item . ",";
}
$categoryidold=$categoryidold . $categoryidtobeadded;
$categoryidoldarray = explode (",", $categoryidold);

if($iscategoryadded==1){
wp_set_post_categories( $postid, $categoryidoldarray);
echo "Category " . $categoryidtobeadded . " Appended Successfuly to post #" . $postid . "<br/>";
}
else {
    

$categoryidtobeaddedarray = explode (",", $categoryidtobeadded);

wp_set_post_categories( $postid, $categoryidtobeaddedarray); 
echo "Category " . $categoryidtobeadded . " Replaced Successfuly to post #" . $postid . "<br/>";
}
}

?>