@extends('layout.app')

@section('content')
<div class="container">
  <section class="lots">
      <h2>Все лоты в категории <span>«{{ $category->name }}»</span></h2>
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
  
  {{ $lots->links() }}
  
</div>
@endsection