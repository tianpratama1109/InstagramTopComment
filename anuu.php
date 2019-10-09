<?php
require_once("mainconfig.php");
$get = request(0, generate_useragent(), 'https://www.instagram.com/p/Bp1G50tHoVZ/?__a=1');
$anu = json_decode($get[1]);
$total = $anu->graphql->shortcode_media->edge_media_to_comment->count;
for($i=0;$i <= $total;$i++){
    $jem = $anu->graphql->shortcode_media->edge_media_to_comment->edges[$i]->node->owner->username;
    if($jem == "rafivadrva"){
        $pk =  $anu->graphql->shortcode_media->edge_media_to_comment->edges[$i]->node->id;
    }
}
if($pk == ""){
    echo "kosong";
} else {
    echo var_dump($pk);
}
?>