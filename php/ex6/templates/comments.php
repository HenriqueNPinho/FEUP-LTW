<?php  
    function output_comment($comment){ ?>
      <article class="comment">
      <span class="user"><?= $comment['username']; ?></span>
      <span class="date"><?= date('F j',$comment['published']); ?></span>
      <p><?= $comment['text']; ?></p>
      </article>
   <?php }

  function output_commentForm(){ ?>
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
  <?php }

    function output_comments($article, $comments){ ?>
        <section id="comments">
          <h1> <?= count($comments);?> comments</h1>

          <?php foreach ($comments as $comment) output_comment($comment); 
          output_commentForm();?>
        </section>
    <?php } ?>