<?php

return [
	[
		'name' => 'title',
		'required' => 'Поле "Заголовок" - обязательно к заполнению',
		'maxlength' => 150,
		'minlength' => 5
	],

	[
		'name' => 'preview',
		'type' => ['url', 'Не верно указан адрес и зображения'],
		'maxlength' => 150
	],

	[
		'name' => 'descr',
		'required' => 'Поле "краткое описание" - обязательно к заполнению',
		'strip' => 1,
		'minlength' => 5,
		'maxlength' => 5000
	],

	[
		'name' => 'message',
		'required' => 'Поле "Текст материала" - обязательно к заполнению',
		'strip' => ['slashes'],
		'maxlength' => 65000,
		'replace' => [
			['/(блядь|сука|ебал|ебать|пидр|чёрт|бля|хуй)/iu', '<s>$1</s>']
		]
	],

	[
		'name' => 'alias',
		'alias' => 'Такой адрес уже занят. Придумайте новый',
		'trim' => ['ltrim', 'd'],
		'replace' => ['/[A-Z]/', function($char) { return strtolower($char[0]); }],
		'pattern' => ['/^[A-Za-z0-9_-]*$/i', 'Только из латинских букв, цифр, тире и нижнего подчеркивания'],
		'maxlength' => 30,
		'minlength' => 3
	],

	[
		'name' => 'capcha',
		'required' => 'Поле обязательно для заполнения',
		'pattern' => ['/^[0-9]*$/', 'Ответом может быть только число'],
		'capcha' => 'Не правильный ответ на вопрос',
		'maxlength' => 2,
		'minlength' => 1
	],

	[
		'remove' => 1,
		'name' => 'add'
	]
];