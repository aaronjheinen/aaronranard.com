<?php if(have_rows('sidebar-nav')): ?>
  <div id="side-nav" class="<?php echo get_field('container_class'); ?>">
    <div class="container-side">
      <nav>
        <ul>
          <li>
            <a class="sidebar-link" id="sidebar-link-title" href="#overview">
              <i class="fa <?php echo get_field('featured_fa_icon'); ?> fa-3x"></i>
              <p class="sidebar-text"><?php echo get_field( 'title_condensed' ); ?></p>
            </a>
          </li>
          <?php while( have_rows('sidebar-nav')): the_row(); ?>
            <li>
              <a class="sidebar-link" id="sidebar-link-<?php echo get_sub_field('target'); ?>" href="#<?php echo get_sub_field('target'); ?>">
                <i class="fa <?php echo get_sub_field('fa_icon'); ?> fa-2x"></i>
                <p class="sidebar-text"><?php echo get_sub_field('title'); ?></p>
              </a>
            </li>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
          <?php endwhile; ?>
        </ul>
      </nav>
      <hr />
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav sidebar-nav'));
        endif;
      ?>
      <div class="back-link">
        <?php if(get_field('work_project') == '1'){ ?>
          <a href="<?= home_url(); ?>/professional" class="btn btn-link">Back to Professional Projects</a>
        <?php } else { ?>
          <a href="<?= home_url(); ?>/personal" class="btn btn-link">Back to Personal Projects</a>
        <?php } ?>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
<?php endif; ?>

<div id="main" <?php if(have_rows('sidebar-nav')): echo 'class="main-content"'; endif; ?> >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="entry-title text-center visible-sm visible-xs">
          <h2>
            <?php echo get_the_title(); ?>
          </h2>
          <h4>
            <?php echo get_field( 'title_description' ); ?>
          </h4>
        </div>
        <?php if (has_post_thumbnail()) : ?>
          <div class="featured-image">
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'large' ); ?>
            <img src="<?php echo $image[0]; ?>" alt="" />
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div> <!-- end .container -->
  <?php if(get_field('work_project') == '1'){ ?>
  <a class="waypoint" name="overview"></a>
  <div class="container-gray container-info">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3>About the Project</h3>
          <hr />
          <?php echo get_field('about'); ?>
        </div>
        <div class="col-md-6">
          <h3>My Role</h3>
          <hr />
          <?php echo get_field('my_role'); ?>
        </div>
      </div>
    </div> <!-- end .container -->
  </div>
  <?php } ?>
  <div class="entry-content">
    <?php the_content(); ?>
    <div class="container">
      <?php if(get_field('url')){
             echo '<a href="'.get_field('url').'" target="_blank" class="btn btn-block btn-info btn-lg">Visit '. get_field('title_condensed') .'</a>';
            } ?>
     </div>
  </div>
  <div class="container">
    <div class="now-what row">
      <div class="col-sm-6">
        <?php
        $prev_post = get_adjacent_post();
        if($prev_post){
          echo '<a class="btn btn-block text-left" href="'.get_permalink($prev_post->ID).'"><i class="fa fa-angle-left"></i>'.$prev_post->post_title.'</a>';
        }
        ?>
      </div>
      <div class="col-sm-6">
        <?php
        $next_post = get_adjacent_post(false,'',false);
        if($next_post){
          echo '<a class="btn btn-block text-right" href="'.get_permalink($next_post->ID).'">'.$next_post->post_title.'<i class="fa fa-angle-right"></i></a>';
         }
        ?>
      </div>
    </div>
  </div>
</div>