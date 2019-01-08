
const gulp =        require('gulp');
const $ =           require('gulp-load-plugins')();
// const browserSync = require('browser-sync');

module.exports = function(options) {

	return function (callback) {
			gulp.src(options.src)
			.pipe($.concat(options.file))
			// .pipe($.uglifyjs())
			.pipe(gulp.dest(options.dest));
			// .pipe(browserSync.reload({stream: true}))
			callback();
	};
};