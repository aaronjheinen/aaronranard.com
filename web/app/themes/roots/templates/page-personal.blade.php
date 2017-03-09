@extends('layouts.base')

@section('content')
  <?php 
  $args = array(
            'post_type' => 'project',
            'meta_query' => array(
              array(
                'key' => 'work_project',
                'value' => '1',
                'compare' => '!='
              )
            ),
            'posts_per_page' => -1 
            );
  $query = new WP_Query( $args );
  ?>
  <div id="side-projects" class="container-gray">
      <div class="container">
        <h1>Personal Projects</h1>
        <p>Things that keep me busy.</p>
    <?php 
    while( $query->have_posts())
    {
      $query->the_post(); ?>
      <div class="project">
          <div class="thumb"> 
            <?php if (get_field( 'featured',  get_the_id() )) { ?>
              <div class="thumb-bg" style="background-image:url('<?php echo get_field('featured' , get_the_id() )['url']; ?>');"></div>
              <?php } else if (has_post_thumbnail( get_the_id() )) { ?>
              <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'single-post-thumbnail' ); ?>
              <div class="thumb-bg" style="background-image:url('<?php echo $image[0]; ?>');"></div>
            <?php } ?>
          </div>
          <div class="entry-title">
            <h2>
              <a href="<?php the_permalink(); ?>">
                <?php echo get_the_title(); ?>
              </a>
            </h2>
            <h4>
              <?php the_excerpt(); ?>
            </h4>
          </div>
        </div>
    <?php
    }
    wp_reset_postdata();
    ?>
     </div><!-- /.container -->
  </div>
@endsection
