@extends('layout.app')

@section('content')
<form class="form container @error('email') form--invalid @enderror" action="{{ route('login') }}" method="post">
  <h2>{{ __('Login') }}</h2>
  <div class="form__item @error('email') form__item--invalid @enderror">
      <label for="email">{{ __('E-Mail Address') }}</label>
      <input id="email" type="text" name="email" placeholder="Введите e-mail" value="{{ old('email') }}" required>
      
      @error('email')
        <span class="form__error">{{ $message }}</span>
      @enderror
  </div>
  <div class="form__item @error('email') form__item--invalid @enderror">
      <label for="password">{{ __('Password') }}</label>
      <input id="password" type="text" name="password" placeholder="Введите пароль" required>
      
      @error('password')
        <span class="form__error">{{ $message }}</span>
      @enderror
    
  </div>

  <div class="form__item form__item--last">
    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

    <label for="remember">
        {{ __('Remember Me') }}
    </label>
  </div>

  <button type="submit" class="button">{{ __('Login') }}</button>

  @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
  @endif

</form>
@endsection