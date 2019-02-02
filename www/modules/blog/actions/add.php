<?php

return function ($target) use ($module, $action) {
    $config = Load::blog('config/config');

    $form_vars = [
        'data' => null,
        'error' => null,
        'alarm' => null
    ];

    if (! empty($_POST)) {
        Load::register('blog', dirname(__DIR__));
        Load::blog('lib/Validator');
        $fields = Load::blog('config/add');
        $addPost = Load::blog('methods/addPost');

        $valid = new Validator($_POST, $fields);
        $valid->run();

        unset($_POST['add']);
        // если ошибок при валидации не возникло
        if ($addPost($_POST)) {
            header('Location: /blog');
        }

        $form_vars['error'] = $valid->errors;
        $form_vars['data'] = $valid->data;
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