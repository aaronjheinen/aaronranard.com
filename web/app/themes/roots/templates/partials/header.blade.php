<header class="banner navbar navbar-toggleable-md navbar-light fixed-top headroom" role="banner">
  <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>     
  <div class="navbar-content">
    <h1><a class="navbar-brand" href="<?php echo home_url(); ?>/" style="background-image:url('/assets/img/logo.png');" title="Me :)"></a></h1>
    <div class="hidden-md-down">
      @include('partials/nav', ['class' => 'float-right'])
    </div>
  </div>
  <div class="hidden-lg-up">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      @include('partials/nav')
    </div>
  </div>
</header>