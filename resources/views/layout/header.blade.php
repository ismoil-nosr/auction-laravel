<div class="main-header__container container">
    <h1 class="visually-hidden">YetiCave</h1>
    <a href="/" class="main-header__logo">
      <img src="/img/logo.svg" width="160" height="39" alt="Логотип компании YetiCave">
    </a>
    <form class="main-header__search" method="post" action="/search" >
        @csrf
        <input type="search" name="search" placeholder="Поиск лота">
        <input class="main-header__search-btn" type="submit" name="find" value="Найти">
    </form>
    
    @if (Auth::user())
        <a class="main-header__add-lot button" href="/add-lot">Добавить лот</a>

        <nav class="user-menu">
            <div class="user-menu__image">
                <img src="/storage/{{ Auth::user()->avatar }}" width="40" height="40" alt="Пользователь">
            </div>
            <div class="user-menu__logged">
                <p>{{ Auth::user()->name }}</p>
                <a href="/logout">Выйти</a>
            </div>
    @else
            <ul class="user-menu__list">
                <li class="user-menu__item">
                  <a href="/register">Регистрация</a>
                </li>
                <li class="user-menu__item">
                  <a href="/login">Вход</a>
                </li>
            </ul>
        </nav>
    @endif
</div>