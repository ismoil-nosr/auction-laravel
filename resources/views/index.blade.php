@extends('layout.app')

@section('content')
<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        @foreach ($categories as $item)
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="/categories/{{ $item->slug }}">{{ $item->name }}</a>
            </li>
        @endforeach
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        @foreach ($lots as $lot)
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="/storage/{{ $lot->img }}" width="350" height="260" alt="{{ $lot->name }}">
                </div>
                <div class="lot__info">
                    <span class="lot__category">{{ $lot->category->name }}</span>
                    <h3 class="lot__title"><a class="text-link" href="/{{ $lot->slug }}">{{ $lot->name }}</a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost">{{ $lot->price }}<b class="rub">р</b></span>
                        </div>
                        <div class="lot__timer timer">
                            {{ getLastHours($lot->dt_end) }}
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</section>
@endsection