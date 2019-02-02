<?php
/**
* Проверка заполненности обязательных полей
* $input - массив input значений
* $fields - путь до файла настроек полей
*/
class Validator
{
	public $errors = [];
	public $data = [];
	public $alarm = [];

	function __construct($input, $fields)
	{
		$this->fields = $fields;
		$this->input = $input;
	}

	public function run()
	{
		foreach ($this->fields as $field) {

			// Если предназначен для удаления, пропускаем итерацию
			if(isset($field['remove']))
				continue;

			$name = $field['name'];
			$value = $this->input[$name];

			// Проверка на обязательность заполнения поля
			if (empty($value)){
				// Если поле пустое и обязательное
				if(isset($field['required']))
					$this->error[$name] = $field['required'];
				// пропускаем итерацию
				continue;
			}

			// Проверка на длину сиволов
			$len = mb_strlen($value, 'utf-8');

			if($field['maxlength'] < $len || $field['minlength'] > $len){
				$this->error[$name] = ($field['maxlength'] < $len)
				? 'Максимальное количество символов: '.$field['maxlength']
				: 'Минимальное количество символов: '.$field['minlength'];
				continue;
			}

			// Проверка на тип
			if(isset($field['type']) && !$this->type($value, $field['type'][0])){
				$this->error[$name] = $field['type'][1];
				continue;
			}

			// Проверка соответствию шаблону (pattern)
			if(isset($field['pattern']) && !preg_match($field['pattern'][0], $value)){
				$this->error[$name] = $field['pattern'][1];
				continue;
			}

			// Выполняем замену по регулярному выражению
			if(isset($field['replace'])){
				foreach ($field['replace'] as $match){
					$limit = $match[2] ? $match[2] : -1;
					$value = preg_replace($match[0], $match[1], $value, $limit);
				}
			}

			// Удаление экранирования, тегов и замена спецсимволов 
			if(isset($field['strip'])){
				$value = $this->strip($value, $field['strip']);
			}

			$this->data[$name] = $value;

		} // foreach
	}

	public function append($arr)
	{
		$this->data = array_merge($this->data, $arr);
	}

	public function createInserQuery($table, $ignore = true)
	{
		$ignore = $ignore ? 'INSERT IGNORE' : 'INSERT';
		$field = $vls = '';
		foreach ($this->data as $key => $val) {
			$field .= ',`'.$key.'`';
			$vls .= ',\''.$val.'\'';
		}
		return $ignore.' `'.$table.'` ('.substr($field,1).') VALUES ('.substr($vls,1).');';
	}

	/**
	* Проверка на тип
	*/
	private function type($value, $type)
	{
		switch ($type){

			// если проверяется email
			case 'email':
				if(filter_var($value, FILTER_VALIDATE_EMAIL))
				break;

			// Если проверяется url
			case 'url':
				if(filter_var($value, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED))
				break;

			// Проверяем целое число
			case 'int':
				if(filter_var($value, FILTER_VALIDATE_INT))
				break;

			default:
				return false;
		} //switch

		// Если условие выполнилось
		return true;
	}

	/**
	* Удаление тегов, экранирование и замена спецсимволов
	*/
	public function strip($value, $arr)
	{
		// если второй параметр не массив
		if(!is_array($arr)){
			// выполняем все действия
			$value = $this->strip($value, array("tags","slashes","chars"));
		}else{
			// Удаляем теги
			if(in_array('tags', $arr))
				$value = strip_tags($value);

			// Удаляем экранирование
			if(in_array('slashes', $arr))
				$value = stripcslashes($value);

			// Замена спецсимволов
			if(in_array('chars', $arr))
				$value = htmlspecialchars($value, ENT_QUOTES);
		}
		return $value;
	}
} // Validator