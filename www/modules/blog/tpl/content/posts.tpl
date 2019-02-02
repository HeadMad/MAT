<? foreach ($posts as $post): ?>
<div class="post" id="<?= $post['id'] ?>">
    <h3 class="post__title"><?= $post['title'] ?></h3>
    <p class="post__description"><?= substr($post['descr'], 0, 100) ?></p>
</div>
<? endforeach ?>