@extends('layouts.base')

@section('content')
   <?php 
      $args = array(
                'post_type' => 'project',
                'meta_query' => array(
                  array(
                    'key' => 'work_project',
                    'value' => '1',
                    'compare' => '=='
                  )
                ),
                'posts_per_page' => -1 
                );
      $query = new WP_Query( $args );
      ?>
      <div id="project-container">
        <?php 
        while( $query->have_posts())
        {
          $query->the_post(); ?>
          <div class="<?php echo get_field('container_class'); ?>">
            <div class="container">
              <a href="<?php the_permalink(); ?>">
                <div class="entry-title text-center">
                  <h2>
                    <?php echo get_the_title(); ?>
                  </h2>
                  <h4>
                    <?php echo get_field( 'title_description' ); ?>
                  </h4>
                </div>
                <div class="post-media"> 
                  <?php if (get_field( 'featured',  get_the_id() )) { ?>
                    <img src="<?php echo get_field('featured' , get_the_id() )['url']; ?>" alt="<?php echo get_the_title(); ?>" width="100%" />
                  <?php } else if (has_post_thumbnail( get_the_id() )) { ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'single-post-thumbnail' ); ?>
                    <img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(); ?>" />
                  <?php } ?>
                </div>
              </a>
            </div>
          </div>
        <?php
        }
        wp_reset_postdata();
        ?>
      </div>
@endsection
