@extends('layout.app')

@section('content')
<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        @foreach ($categories as $item)
            <li class="promo__item promo__item--{{ $item->slug }}">
                <a class="promo__link" href="/categories/{{ $item->slug }}">{{ $item->name }}</a>
            </li>
        @endforeach
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2><a href="/lots">Открытые лоты</a></h2>
    </div>
    <ul class="lots__list">
        @foreach ($lots as $lot)
            @include('lot.mini')
        @endforeach
    </ul>
</section>
@endsection