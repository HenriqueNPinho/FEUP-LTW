<?php 

    function output_news_footer($article){ 
        $tags = explode(',', $article['tags']); ?> 
        <footer>
          <span class="author"><?= $article['name'] ?> </span>
          <?php foreach($tags as $tag){ ?>
          <span class="tags"><?= "#".$tag; ?> </span>
          <?php }?>
          <span class="date"> <?= $date = date('F j', $article['published']); ?></span>
          <a class="comments" href="item.php?id=<?= $article['id'];?>" ><?=count($article['comments']);?> </a>
        </footer>
       <?php }

    function output_article($article, $comments = null){
     ?>
     <section id="news">
      <article>
      <header>
        <h1><a href="item.php?id=<?= $article['id'];?>"> <?=  $article['title']; ?> </a></h1>
      </header>
      <img src="https://picsum.photos/600/300?<?= $article['id'];?>" alt="random image">
      <p><?= $article['introduction']; ?><p>

      <?php if($comments != null){
            output_comments($article, $comments);
          } 
    output_news_footer($article);?>
    
    </article>   
    </section>   
    <?php } 

    function output_Article_list($articles){ ?>
        
      <?php foreach( $articles as $article) output_article($article);?> 
      
  <?php  } 