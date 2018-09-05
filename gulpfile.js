'use strict';

const gulp     = require('gulp');

// Функция ленивой загрузки задач
function requireTask (taskName, path, options)
{
	options.taskName = taskName;
	gulp.task(taskName, function(callback){
		let task = require(path)
		.call(this, options);
		return task(callback);
	});
}

requireTask('styles', './tasks/styles', {
	src: ['./assets/css/*.css'],
	file: 'styles.css',
	dest: './public/css'
});
