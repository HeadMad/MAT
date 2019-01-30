<?php

// $err = $data['err'];
// $alarm = $data['alarm'];
// $data = $data['data'];

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
		<span class="form__label">Ссылка на привью</span>
		<input class="input input_width" type="text" name="preview"  value="<?= $data['preview'] ?? '' ?>">
		<?= $getError('preview') ?>
	</label>
	<label class="form__row">
		<span class="form__label">Краткое описание</span>
		<textarea class="textarea textarea_width" name="descr"><?= $data['descr'] ?? '' ?></textarea>
		<?= $getError('descr') ?>
	</label>
	<label class="form__row">
		<span class="form__label">Полное описание</span>
		<textarea class="textarea textarea_height_xl textarea_width" name="message"><?= $data['message'] ?? '' ?></textarea>
		<?= $getError('message') ?>
	</label>
	<label class="form__row">
		<span class="form__label">Человекопонятный url</span>
		<input class="input input_width" type="text" name="alias" value="<?= $data['alias'] ?? '' ?>">
		<?= $getError('alias') ?>
	</label>
	<label class="form__row">
		<span class="form__label">Сложите числа</span>
		<input class="input input_type_capcha" style="background-image: url(/static/capcha)" type="text" name="capcha" value="">
		<?= $getError('capcha') ?>
	</label>
	<div class="form__row">
		<input class="btn btn_size_xl btn_style_gradient" type="submit" name="add" value="Добавить новость">
	</div>
	
</form>