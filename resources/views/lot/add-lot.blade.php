@extends('layout.app')

@section('content')
<form class="form form--add-lot container form--invalid" action="https://echoacademy.ru" method="post">
  <!-- form--invalid -->
  <h2>Добавление лота</h2>
  <div class="form__container-two">
      <div class="form__item form__item--invalid">
          <!-- form__item--invalid -->
          <label for="lot-name">Наименование</label>
          <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" required>
          <span class="form__error">Введите наименование лота</span>
      </div>
      <div class="form__item">
          <label for="category">Категория</label>
          <select id="category" name="category" required>
        <option>Выберите категорию</option>
        <option>Доски и лыжи</option>
        <option>Крепления</option>
        <option>Ботинки</option>
        <option>Одежда</option>
        <option>Инструменты</option>
        <option>Разное</option>
      </select>
          <span class="form__error">Выберите категорию</span>
      </div>
  </div>
  <div class="form__item form__item--wide">
      <label for="message">Описание</label>
      <textarea id="message" name="message" placeholder="Напишите описание лота" required></textarea>
      <span class="form__error">Напишите описание лота</span>
  </div>
  <div class="form__item form__item--file">
      <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="preview">
          <button class="preview__remove" type="button">x</button>
          <div class="preview__img">
              <img src="/img/avatar.jpg" width="113" height="113" alt="Изображение лота">
          </div>
      </div>
      <div class="form__input-file">
          <input class="visually-hidden" type="file" id="photo2" value="">
          <label for="photo2">
        <span>+ Добавить</span>
      </label>
      </div>
  </div>
  <div class="form__container-three">
      <div class="form__item form__item--small">
          <label for="lot-rate">Начальная цена</label>
          <input id="lot-rate" type="number" name="lot-rate" placeholder="0" required>
          <span class="form__error">Введите начальную цену</span>
      </div>
      <div class="form__item form__item--small">
          <label for="lot-step">Шаг ставки</label>
          <input id="lot-step" type="number" name="lot-step" placeholder="0" required>
          <span class="form__error">Введите шаг ставки</span>
      </div>
      <div class="form__item">
          <label for="lot-date">Дата окончания торгов</label>
          <input class="form__input-date" id="lot-date" type="date" name="lot-date" required>
          <span class="form__error">Введите дату завершения торгов</span>
      </div>
  </div>
  <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
  <button type="submit" class="button">Добавить лот</button>
</form>
@endsection
