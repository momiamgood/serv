<?php

use Src\Auth\Auth;

?>
<div class="sidebar">
    <div class="sidebar-top">
        <p class="logo"><img class="logo-img" src="../../../public/static/media/lib_logo.png" alt="logo-ico">Библиотека
        </p>
        <nav>
            <a href="<?= app()->route->getUrl('/books') ?>">Книги</a>
            <a href="<?= app()->route->getUrl('/readers') ?>">Читатели</a>

            <?php if (Auth::user()->role->role === 'admin'): ?>
                <a href="<?= app()->route->getUrl('/genre') ?>">Жанры</a>
                <a href="<?= app()->route->getUrl('/publishers') ?>">Издательства</a>
                <a href="<?= app()->route->getUrl('/halls') ?>">Залы</a>
                <a href="<?= app()->route->getUrl('/librarians') ?>">Сотрудники</a>
            <?php endif; ?>
        </nav>
    </div>
    <div class="sidebar-bottom">
        <a href="<?= app()->route->getUrl('/profile') ?>" class="sidebar-link sidebar-img-link"><img
                src="../../../public/static/media/profile_icon.svg"
                alt="profile-icon"><?= app()->auth::user()->name ?>
        </a>
        <a href="<?= app()->route->getUrl('/logout') ?>" class="sidebar-link sidebar-img-link"><img
                src="../../../public/static/media/logout_icon.svg" alt="logout-icon">Выход</a>
    </div>
</div>
<main>
    <h1>Редактирование книги</h1>
    <form method="post">
        <label for="name">Название</label>
        <input type="text" name="name" id="name">
        <label for="author">Автор</label>
        <input type="text" name="author" id="author">
        <label for="date">Дата публикации</label>
        <input type="date" name="date_publish" id="date">
        <label for="price">Цена</label>
        <input type="text" name="price" id="price">
        <label for="annotation">Аннотация</label>
        <input type="text" name="annotation" id="annotation">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="new" name="new">
            <label class="form-check-label" for="flexCheckDefault">
                Новая книга
            </label>
        </div>

        <select class="form-select" aria-label="" name="genre_id">
            <option selected>Выберете жанр</option>
            <?php
            foreach ($genre_list
                     as $genre) {?>

                <option value="<?= $genre->id ?>"><?= $genre->name ?></option>
                <?php
            }
            ?>
        </select>
        <select class="form-select" aria-label="Default select example" name="hall_id">
            <option selected>Выберете зал</option>
            <?php
            foreach ($hall_list

                     as $hall) {
                ?>

                <option value="<?= $hall->id ?>"><?= $hall->id ?></option>
                <?php
            }
            ?>

        </select>
        <select class="form-select" aria-label="" name="publisher_id">
            <option selected>Выберете издателя</option>
            <?php
            foreach ($publisher_list

                     as $publisher) {
                ?>

                <option value="<?= $publisher->id ?>"><?= $publisher->name ?></option>
                <?php
            }
            ?>

        </select>

        <button class="submit-btn">Изменить</button>
    </form>

</main>