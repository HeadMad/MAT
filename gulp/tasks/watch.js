'use strict';
const gulp = require('gulp');

module.exports = function(options) {
	return function() {
		delete options.taskName;
		for (let src in options)
			gulp.watch(src, options[src]);
	}
};