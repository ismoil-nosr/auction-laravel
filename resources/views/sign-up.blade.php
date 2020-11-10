@extends('layout.app') 

@section('content')
<form class="form container @error('email') form--invalid @enderror" action="{{ route('register') }}" method="post">
    <h2>{{ __('Register') }}</h2>
    <div class="form__item @error('email') form__item--invalid @enderror">
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="{{ old('email') }}" required>
        <span class="form__error">Введите e-mail</span>

        @error('email')
            <span class="form__error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form__item @error('password') form__item--invalid @enderror">
        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" name="password" placeholder="Введите пароль" value="{{ old('password') }}" required>
        
        <label for="password">{{ __('Confirm Password') }}</label>
        <input id="password" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
        
        @error('password')
            <span class="form__error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form__item @error('name') form__item--invalid @enderror">
        <label for="name">{{ __('Name') }}</label>
        <input id="name" type="text" name="name" placeholder="Иван Иваныч" required>

        @error('name')
            <span class="form__error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form__item @error('message') form__item--invalid @enderror">
        <label for="contacts">Контактные данные*</label>
        <textarea id="contacts" name="contacts" placeholder="Напишите как с вами связаться" value="{{ old('contacts') }}" required></textarea>
        <span class="form__error">Напишите как с вами связаться</span>

        @error('message')
            <span class="form__error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form__item form__item--file form__item--last">
        <label>Аватар</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="/img/avatar.jpg" width="113" height="113" alt="Ваш аватар">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" name="avatar" type="file" id="photo2" value="">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
    </div>

    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Зарегистрироваться</button>
    <a class="text-link" href="#">Уже есть аккаунт</a>
</form>
@endsection