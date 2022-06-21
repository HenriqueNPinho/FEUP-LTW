<?php 
  require_once('database/connection.php');
  require_once('./database/news.php');
  require_once('./database/comments.php');

  require_once('./templates/common.php'); 
  require_once('./templates/news.php');
  require_once('./templates/comments.php');

  $db = getDatabaseConnection();
  $id= intval($_GET['id']);
  $article = getAllArticles($db, $id);
  $comments = getAllComments($db, $id);

  output_header();
  output_article($article, $comments);
  output_footer() ?>
