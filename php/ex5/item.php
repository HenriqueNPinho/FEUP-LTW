<?php 
  require_once('database/connection.php');
  require_once('./database/news.php');
  require_once('./database/comments.php');

  $db = getDatabaseConnection();
  $id= intval($_GET['id']);
  $article = getAllArticles($db, $id);
  $comments = getAllComments($db, $id);
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Super Legit News</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/comments.css" rel="stylesheet">
    <link href="css/forms.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <h1><a href="index.php">Super Legit News</a></h1>
      <h2><a href="index.php">Where fake news are born!</a></h2>
      <div id="signup">
        <a href="register.html">Register</a>
        <a href="login.html">Login</a>
      </div>
    </header>
    <nav id="menu">
      <!-- just for the hamburguer menu in responsive layout -->
      <input type="checkbox" id="hamburger"> 
      <label class="hamburger" for="hamburger"></label>

      <ul>
        <li><a href="index.php">Local</a></li>
        <li><a href="index.php">World</a></li>
        <li><a href="index.php">Politics</a></li>
        <li><a href="index.php">Sports</a></li>
        <li><a href="index.php">Science</a></li>
        <li><a href="index.php">Weather</a></li>
      </ul>
    </nav>
    <aside id="related">
      <article>
        <h1><a href="#">Duis arcu purus</a></h1>
        <p>Etiam mattis convallis orci eu malesuada. Donec odio ex, facilisis ac blandit vel, placerat ut lorem. Ut id sodales purus. Sed ut ex sit amet nisi ultricies malesuada. Phasellus magna diam, molestie nec quam a, suscipit finibus dui. Phasellus a.</p>
      </article>        
      <article>
        <h1><a href="#">Sed efficitur interdum</a></h1>
        <p>Integer massa enim, porttitor vitae iaculis id, consequat a tellus. Aliquam sed nibh fringilla, pulvinar neque eu, varius erat. Nam id ornare nunc. Pellentesque varius ipsum vitae lacus ultricies, a dapibus turpis tristique. Sed vehicula tincidunt justo, vitae varius arcu.</p>
      </article>
      <article>
        <h1><a href="#">Vestibulum congue blandit</a></h1>
        <p>Proin lectus felis, fringilla nec magna ut, vestibulum volutpat elit. Suspendisse in quam sed tellus fringilla luctus quis non sem. Aenean varius molestie justo, nec tincidunt massa congue vel. Sed tincidunt interdum laoreet. Vivamus vel odio bibendum, tempus metus vel.</p>
      </article>
    </aside>
    <section id="news">
      <article>
        <header>
          <h1><a href="item.php?id=<?= $article['id'];?>"> <?=$article['title']?> </a></h1>
        </header>
        <img src="https://picsum.photos/600/300?<?= $article['id'];?> " alt="">
        <p><?= $article['introduction']; ?><p>
        <?php foreach (explode("\n\n", $comments['text']) as $paragraph) { ?>
                <p><?= $paragraph ?></p>
            <?php } ?>

        <section id="comments">
          <h1> <?= count($comments);?> comments</h1>

          <?php foreach ($comments as $comment){?>

          <article class="comment">
            <span class="user"><?= $comment['username']; ?></span>
            <span class="date"><?= date('F j',$comment['published']); ?></span>
            <p><?= $comment['text']; ?></p>
          </article>

          <?php }?>

          <form>
            <h2>Add your voice...</h2>
            <label>Username 
              <input type="text" name="username">
            </label>
            <label>E-mail
              <input type="email" name="email">
            </label>
            <label>Comment
              <textarea name="comment"></textarea>            
            </label>
            <button formaction="#" formmethod="post">Reply</button>
          </form>
        </section>
        <footer>
          <span class="author"><?= $article['name'] ?> </span>
          <?php foreach($tags as $tag){ ?>
          <span class="tags"><?= "#".$tag; ?> </span>
          <?php }?>
          <span class="date"> <?= $date = date('F j', $article['published']); ?></span>
          <a class="comments" href="item.php?id=<?= $article['id'];?>" ><?=count($article['comments']);?> </a>
        </footer>
      </article>
    </section>
    <footer>
      <p>&copy; Fake News, 2022</p>
    </footer>
  </body>
</html>
