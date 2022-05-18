<?php 

const ALL_RESTAURANTS_Q= 'SELECT restaurant.* FROM restaurant
GROUP BY restaurant.id';

const REVIEWS_Q='SELECT reviews.* FROM reviews
WHERE restaurant_id = ?
GROUP BY reviews.id';

function getAllRestaurants(PDO $db){
    $stmt = $db->prepare(ALL_RESTAURANTS_Q);
    $stmt->execute();
    return $stmt->fetchAll();
}


function drawRating($checked, $total=5){
    $unchecked=$total-$checked;

    for($i=0; $i<$checked;$i++){    
        echo "<span class=\"fa fa-star checked\"></span>"; 
    } 

    for($i=0; $i<$unchecked;$i++){      
        echo "<span class=\"fa fa-star\"></span>"; 
    } 
}

function getAverageRate(PDO $db, int $id){
    $reviews = getRestaurantRate($db, $id) ;
    $i=0;
    $j=0;
    foreach ( $reviews as $review){
      $i= $i + $review['rate'];
      $j= $j +1;
    } 
    return (int) ($i/$j);
}

function getRestaurantRate(PDO $db, int $id){
    $stmt = $db->prepare(REVIEWS_Q);
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}


?>