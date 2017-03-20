<nav class="nav-primary">
  <ul class="nav navbar-nav float-right">
    @foreach($menu as $slug => $name)
      <li class="nav-item">
        <a class="nav-link" href="/{{ $slug }}">{{ $name }}</a>
      </li>
    @endforeach
  </ul>
</nav>