<h1>Список пользователей</h1>

<div class="users__list">
<? foreach ($users as $user): ?>
    <div class="users__item user" id="<?= $user['id'] ?>">
        <img src="<?= $user['avatar'] ?: '//img/no-ava.png' ?>" alt="" class="user__avatar">
        <div class="user__name"><?= $user['name'] ?></div>
    </div>
<? endforeach ?>
</div>
