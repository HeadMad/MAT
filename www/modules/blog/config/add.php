<?php

return [
	[
		'name' => 'title',
		'required' => 'Поле "Заголовок" - обязательно к заполнению',
		'maxlength' => 150,
		'minlength' => 5
	],

	[
		'name' => 'descr',
		'required' => 'Поле "краткое описание" - обязательно к заполнению',
		'strip' => 1,
		'minlength' => 5,
		'maxlength' => 5000
	],

	[
		'name' => 'content',
		'required' => 'Поле "текст материала" - обязательно к заполнению',
		'strip' => 1,
		'minlength' => 5,
		'maxlength' => 5000
	],

];