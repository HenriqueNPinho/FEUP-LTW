<?php 
declare(strict_types=1);

const ALL_NEWS_Q= 'SELECT news.*, users.*, COUNT(comments.id) AS comments
FROM news JOIN
     users USING (username) LEFT JOIN
     comments ON comments.news_id = news.id
GROUP BY news.id, users.username
ORDER BY published DESC';

const ALL_ARTICLES_Q ='SELECT * FROM news JOIN users USING (username) WHERE id = ?';

function getAllNews(PDO $db){
    $stmt = $db->prepare(ALL_NEWS_Q);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getAllArticles(PDO $db, int $id){
    $stmt = $db->prepare(ALL_ARTICLES_Q);
    $stmt->execute(array($id));
    return $stmt->fetch();
}

?>