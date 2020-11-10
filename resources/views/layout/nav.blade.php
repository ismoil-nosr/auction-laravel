<nav class="nav">
    <ul class="nav__list container">
      @foreach ($categories as $item)
        <li class="nav__item">
          <a href="/categories/{{ $item->slug }}">{{ $item->name }}</a>
        </li>
      @endforeach
    </ul>
</nav>