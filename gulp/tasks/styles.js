
const gulp = require('gulp');
const $    = require('gulp-load-plugins')();
// const browserSync = require('browser-sync');

module.exports = function(options) {

	return function (callback) {
			var sourcemaps = require('gulp-sourcemaps');

            // массив плагинов для postcss
			var plugins = [
    			require('postcss-short')(),
    			require('postcss-cssnext')({compress: true}),
    			// require('css-mqpacker')({sort: false}),
			];

			return gulp.src(options.src)
			.pipe(sourcemaps.init())
			.pipe($.concat(options.file))
			.pipe($.postcss(plugins))
			.pipe(sourcemaps.write())
			.pipe(gulp.dest(options.dest));
	};
};
