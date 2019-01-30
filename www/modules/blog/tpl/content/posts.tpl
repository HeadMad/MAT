<? foreach ($posts as $post): ?>
<div class="post" id="<?= $post['id'] ?>">
    <div class="post__title"><?= $post['title'] ?></div>
    <p class="post__description"><?= substr($post['description'], 0, 100) ?></p>
</div>
<? endforeach ?>