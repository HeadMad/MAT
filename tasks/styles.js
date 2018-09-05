
const gulp =        require('gulp');
const $ =           require('gulp-load-plugins')();
// const browserSync = require('browser-sync');

module.exports = function(options) {

	return function (callback) {
			var sourcemaps = require('gulp-sourcemaps');
			var plugins = [
			// require('precss')(),
			// require('postcss-smart-import')(),
			require('postcss-short')(),
			require('postcss-cssnext')({
				compress: true
			}),
			require('css-mqpacker')({sort: false}),
			// require('cssnano')({
			// 	core: false,
			// 	autoprefixer: false,
			// })
			];

			gulp.src(options.src)
			.pipe(sourcemaps.init())
			.pipe($.concat(options.file))
			.pipe($.postcss(plugins))
			// .pipe($.csscomb())
			.pipe(sourcemaps.write())
			.pipe(gulp.dest(options.dest));
			// .pipe(browserSync.reload({stream: true}))
			callback();
	};
};