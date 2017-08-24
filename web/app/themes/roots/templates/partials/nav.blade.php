
<ul class="nav navbar-nav ml-auto mt-2 mt-lg-0">
@foreach($menu as $slug => $name)
  <li class="nav-item">
    <a class="nav-link" href="/{{ $slug }}">{{ $name }}</a>
  </li>
@endforeach
</ul>