<div class="container">
  <ul class="breadcrumbs">
    <li><a href="<?php echo site_url(); ?>/blog">Blog</a></li>
    <li class="current"><a href="#"><?php echo get_the_title(); ?></a></li>
  </ul>
  <?php if (has_post_thumbnail()) : ?>
    <div class="featured-image">
      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'large' ); ?>
      <img src="<?php echo $image[0]; ?>" alt=""/>
    </div>
    <?php endif; ?>
  <div class="entry-content">
    <h2>{{ get_the_title() }}</h2>
    <p class="help-block">@php(the_date('F j, Y'))</p>
      @php(the_content())
  </div>
</div> <!-- end .container -->
<div class="container-gray">
  <div class="container">
    <div class="now-what row">
      <div class="col-sm-6">
       <?php
        $prev_post = get_adjacent_post();
        if($prev_post){ ?>
          <a class="prev" href="<?= get_permalink($prev_post->ID) ?>">
            <p class="pull-left"><i class="fa fa-angle-left fa-2x"></i></p>
            <h3><?= $prev_post->post_title ?></h3>
          </a>
      <?php } ?>
      </div>
      <div class="col-sm-6">
      <?php
        $next_post = get_adjacent_post(false,'',false);
        if($next_post){ ?>
          <a class="next" href="<?= get_permalink($next_post->ID) ?>">
            <p class="pull-right"><i class="fa fa-angle-right fa-2x"></i></p>
            <h3><?= $next_post->post_title ?></h3>
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
</div><!-- /.container-gray -->