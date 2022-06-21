<?php
  $db = new PDO('sqlite:news.db');

  $stmt = $db->prepare('SELECT * FROM news');
  $stmt->execute();
  $articles = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing data from SQLite</title>
</head>

<body>

  <?php foreach( $articles as $article) {?>
   <h1><?=  $article['title'] ; ?></h2>
   <p><?= $article['introduction']; ?><p>
  <?php }?>

  </body>
</html>