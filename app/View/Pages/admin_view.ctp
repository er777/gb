<!-- File: /app/View/Pages/view.ctp -->

<h2 class="gb-heading"><?php echo h($page['Page']['name']); ?></h2>

<p><small>Created: <?php echo $page['Page']['created']; ?></small></p>

<p><?php echo($page['Page']['body']); ?></p>