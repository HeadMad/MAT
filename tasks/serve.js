'use strict';

const gulp =        require('gulp');
// const $ =           require('gulp-load-plugins')();
const browserSync = require('browser-sync');

module.exports = function(options) {

	return function (callback) {
		browserSync.init(options.sett);
		browserSync.watch(options.watch)
		.on('chenge', browserSync.reload);
	};
};