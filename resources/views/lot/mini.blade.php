<li class="lots__item lot {{ !$lot->isActive() ? 'rates__item--end' : '' }}">
    <div class="lot__image">
        <img src="/uploads/{{ $lot->img }}" width="350" height="260" alt="{{ $lot->name }}">
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
                {{ $lot->getTimeRemaing() ?: 'Торги окончены'}}
            </div>
        </div>
    </div>
</li>