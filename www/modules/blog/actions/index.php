<?php

return function () use ($module) {
	return 'Страницы <b>/' . $_GET['uri'] . '</b> - не существует<br> Перейти <a href="/' . $module . '">на главную страницу модуля</a>';
};