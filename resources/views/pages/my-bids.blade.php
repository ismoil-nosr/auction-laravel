@extends('layout.app')

@section('content')

<section class="rates container">
  <h2>Мои ставки</h2>
  <table class="rates__list">
    @foreach ($bids as $item)
        @if ($winner = $item->lot->getWinner())
            <tr class="rates__item rates__item--win">
                <td class="rates__info">
                    <div class="rates__img">
                        <img src="/uploads/{{ $item->lot->img }}" width="54" height="40" alt="Крепления">
                    </div>
                    <div>
                        <h3 class="rates__title"><a href="/{{ $item->lot->slug }}">{{ $item->lot->name }}</a></h3>
                        <p>Контакты продавца: {{ $item->lot->user->contacts }}</p>
                    </div>
                </td>
            
                <td class="rates__timer">
                    <div class="timer timer--win">Ставка выиграла</div>
                </td>
            </tr>
        @elseif ($item->lot->isActive()) 
            <tr class="rates__item">
                <td class="rates__info">
                    <div class="rates__img">
                        <img src="/uploads/{{ $item->lot->img }}" width="54" height="40" alt="{{ $item->lot->name }}">
                    </div>
                    <h3 class="rates__title"><a href="/{{ $item->lot->slug }}">{{ $item->lot->name }}</a></h3>
                </td>
                <td class="rates__category">
                    {{ $item->lot->category->name }}
                </td>
                <td class="rates__timer">
                    <div class="timer">{{ $item->lot->getTimeRemaing() }}</div>
                </td>
                <td class="rates__price">
                    
                    {{ $item->price }} р
                </td>
                <td class="rates__time">
                    {{ $item->getBiddedTime() }}
                </td>
            </tr>
        @else
            <tr class="rates__item rates__item--end">
                <td class="rates__info">
                    <div class="rates__img">
                        <img src="/uploads/{{ $item->lot->img }}" width="54" height="40" alt="{{ $item->lot->name }}">
                    </div>
                    <h3 class="rates__title"><a href="/{{ $item->lot->slug }}">{{ $item->lot->name }}</a></h3>
                </td>
                <td class="rates__category">
                    {{ $item->lot->category->name }}
                </td>
                <td class="rates__timer">
                    <div class="timer timer--end">Торги окончены</div>
                </td>
                <td class="rates__price">
                    {{ $item->price }} р
                </td>
                <td class="rates__time">
                    {{ $item->getBiddedTime() }}
                </td>
            </tr>
        @endif
    @endforeach
  </table>
</section>
@endsection