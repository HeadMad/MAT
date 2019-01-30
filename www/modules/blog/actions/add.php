<?php

Load::lib('view');

return function ($target) use ($module, $action) {
	// относительный путь
    chdir('./modules/' . $module);

    $config = require './config/config.php';

    $form_vars = [
        'data' => null,
        'error' => null,
        'alarm' => null
    ];

    if (! empty($_POST)) {
        require './lib/Validator.php';
        $fields = require './config/add.php';

        $valid = new Validator($_POST, $fields);
        
        $valid->run();

        $form_vars['data'] = $valid->data;
        $form_vars['error'] = $valid->error;
        $form_vars['alarm'] = $valid->alarm;
    }


	// Массив с переменными используемыми в шаблоне
	$vars = array(
		'title' => $config['module_name'] . ' - Добавление материала',
        'content' => view('blog/content/addForm', $form_vars),
	);

	// Выводим код главной страницы
	return view('blog/layout', $vars);
};