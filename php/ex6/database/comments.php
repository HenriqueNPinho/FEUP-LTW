<?php 
declare(strict_types=1);

const ALL_COMMENTS_Q ='SELECT * FROM comments WHERE news_id = ?';

function getAllComments(PDO $db, int $id){
    $stmt = $db->prepare(ALL_COMMENTS_Q);
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}
?>
