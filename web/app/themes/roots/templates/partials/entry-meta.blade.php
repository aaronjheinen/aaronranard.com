<span class="meta tags">
  <?php
  $tags = get_the_category();
  if ($tags) {
    $count = 0;
    foreach($tags as $tag) {
      if($count > 0){
        echo ', ';
      }
      echo '<a href="<?php echo home_url(); ?>/category/'.$tag->slug.'">'. $tag->name .'</a>'; 
      $count++;
    }
  }
  ?>
</span>
<span class="meta entry-date"><?php echo get_the_date(); ?></span>