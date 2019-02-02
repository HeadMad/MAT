<?php

$getError = function($name) use ($error) {
    return (! isset($error[$name])) ? '' : '<div class="form__msg form__msg_err">' . $error[$name] . '</div>';
};

?>
<form class="form m-depth_2" action="/blog/add" method="post">
	<div class="form__title">Добавить запись в блоге</div>
	<hr class="hr">
	
	<label class="form__row">
		<span class="form__label">Заголовок</span>
		<input class="input input_width" type="text" name="title" value="<?= $data['title'] ?? '' ?>">
		<?= $getError('title') ?>
	</label>
	<label class="form__row">
		<span class="form__label">Краткое описание</span>
		<textarea class="textarea textarea_width" name="descr"><?= $data['descr'] ?? '' ?></textarea>
		<?= $getError('descr') ?>
	</label>
	<label class="form__row">
		<span class="form__label">Полное описание</span>
		<textarea class="textarea textarea_height_xl textarea_width" name="content"><?= $data['content'] ?? '' ?></textarea>
		<?= $getError('content') ?>
	</label>

	<div class="form__row">
		<input class="btn btn_size_xl btn_style_gradient" type="submit" name="add" value="Добавить новость">
	</div>
	
</form>