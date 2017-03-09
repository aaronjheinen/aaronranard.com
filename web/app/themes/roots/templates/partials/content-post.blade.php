<div class="post">
  <div class="icon">
    <?php if(get_field( 'thumbnail' )) : ?>
      <?php $image = (get_field( 'thumbnail' )); ?>
      <a href="<?php echo get_permalink(); ?>">
        <img src="<?php echo $image['url']; ?>" alt="" class="img-circle" width="75px" style="float:left;" />
      </a>
    <?php endif;  ?>
  </div>
  <div class="details">
    <h3><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h3>
    <p>
      @php(the_excerpt())
    </p>
    <p>
      @include('partials/entry-meta')
    </p>
  </div>
</div>
