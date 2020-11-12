@extends('layout.app')

@section('content')
    <section class="lot-item container">
        <h2>{{ $lot->name }}</h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="/storage/{{ $lot->img }}" width="730" height="548" alt="{{ $lot->name }}">
                </div>
                <p class="lot-item__category">Категория: <span><a href="/categories/{{ $lot->category->slug }}">{{ $lot->category->name }}</a></span></p>
                <p class="lot-item__description">
                    {{ $lot->description }}
                </p>
            </div>
            <div class="lot-item__right">
                <div class="lot-item__state">
                    <div class="lot-item__timer timer">
                        {{ getLastHours($lot->dt_end) }}
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount">Текущая цена</span>
                            <span class="lot-item__cost">{{ $lot->getCurrentPrice() }}<b class="rub">р</b></span>
                        </div>
                        <div class="lot-item__min-cost">
                            Мин. ставка <span>{{ $lot->getBidPrice() }}<b class="rub">р</b></span>
                        </div>
                    </div>
                    <form class="lot-item__form" action="/{{ $lot->slug }}/bids" method="post">
                        @csrf
                        <p class="lot-item__form-item">
                            <label for="cost">Ваша ставка</label>
                            <input id="cost" type="number" name="price" placeholder="{{ $lot->getBidPrice() }}" min="{{ $lot->getBidPrice() }}">
                        </p>

                        @error('price')
                         {{ $message }}
                        @enderror

                        <button type="submit" class="button">Сделать ставку</button>
                    </form>
                </div>
                <div class="history">
                    <h3>История ставок (<span>{{ $bids->count() }}</span>)</h3>
                    <table class="history__list">
                        <tr class="history__item">
                            <th class="history__name">Имя</th>
                            <th class="history__price">Ставка</th>
                            <th class="history__time">Время</th>
                        </tr>
                        @foreach ($bids as $bid)
                            <tr class="history__item">
                                <td class="history__name">{{ $bid->user->name }}</td>
                                <td class="history__price">{{ $bid->price }}</td>
                                <td class="">{{ getLastHours($bid->created_at) }}</td>
                            </tr>                            
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection