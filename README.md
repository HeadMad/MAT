# MAT

Cтартовый фреймворк для создания простых и не очень проектов, написанный на php. В основу движка заложена тесная работа файловой структуры и исполняемых сценариев. Простота системы обеспечивает низкий порог вхождения и расширяемость.

<small>Установка</small>  
`git clone https://github.com/HeadMad/MAT.git`

<small>Установка в текущую дирректорию</small>  
`git clone https://github.com/HeadMad/MAT.git .`

## Содержание

* [Концепция](#Концепция)
* [Файловая структура](#Файловая-структура)
* [Модуль](#Модуль)
* [Экшен](#Экшен)
* [Таргет(цель)](#Таргет)

**Дополнительная информация**

* [История изменений](./CHANGELOG.ru.md)
* [Рекомендации](./GUIDES.ru.md)  


## Концепция

`MAT` - аббревиатура от **module**/**action**/**target**. Эти три параметра представляют собой uri запрос, благодоря которому можно получить доступ к любой доступной информации на сайте созданном с помощью этого фреймворка. При этом параметр _target_ является не обязательным, а скорее уточняющим.

> **Пример**
>
> `/blog/post/25` - uri по которому мы получаем доступ к записи (_post_) в модуле _blog_ с идентификатором равным _25_.
> По факту же, в нашем проекте есть дирректория _blog_, в которой лежит обработчик _post_.php, принимающий входной параметр _25_ в качестве аргумента.
>
> Идеологически, напоминает концепцию `MVC`. Только в качестве модели выступает экшен, а в качестве контроллера - роутер и файловая система. За счет того, что каждая модель-экшен представляет отдельный файл, не происходит подгрузки лишнего кода, что хорошо сказывается на быстродействии. Кроме того это заметно упрощает процесс разработки.

Из коробки в системе уже идет один модуль - [index](./app/modules/index/index.ru.md)  
Он является служебным и содержит ряд экшенов необходимых для работы системы, таких как стартовая страница, страницы ошибок. Модул можно без проблем расширять своими экшенами, например страницы входа или регистрации пользователей.

В [рекомендациях](./GUIDES.ru.md) указано, что каждый модуль должен иметь экшен с именем _index_. Он будет являться главной страницей модуля. Если в uri не указывать экшен, то система автоматически будет ссылаться именно на него.

Если в запрашиваемом uri вообще ничего не указанно, то откроется экшен _index_, модуля _index_.

* `/` = _/index/index_
* `/index` = _/index/index_
* `/index/index` = _/index/index_  


## Файловая структура

**Корень сайта**  
_<small>*Такая структура корневой дирректории позволяет развернуть фронтенд прямо в ней</small>_

```
root
    ├── .htaccess
    ├── public
    └── app
```
* `.htacces` - файл конфигурации web-сервера Apache
* `public` - дирректория с общедоступными файлами
* `app` - наше приложение, его серверная часть
  
**Публичные файлы** (public)

```
public
    ├── .htaccess
    ├── img
    ├── css
    └── js
```
* `.htacces` - необходим для корректного достпа к файлам
* `img` - изображения
* `css` - файлы стилей
* `js` - javascript файлы
  
**Приложение** (app)

```
app
    ├── index.php
    ├── modules
    └── lib
```
* `index.php` - точка входа в приложение
* `modules` - дирректория с модулями системы
* `lib` - библиотека скриптов, таких как _router_  


## Модуль

**Структура модуля**

```
modules
    ├── ...
    └── index
	    ├── actions
	    └── tpl
```  

## Экшен  

## Таргет
