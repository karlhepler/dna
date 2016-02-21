var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var lost = require('lost');
var sourcemaps = require('gulp-sourcemaps');
var postcss = require('gulp-postcss');
var notify = require('gulp-notify');
var bower = require('bower-files')();

var src = {
	scripts: bower.ext('js').files.concat('resources/**/*.js'),
	sass: 'resources/sass/app.sass'
};

var options = {
	sass: {},
	autoprefixer: {}
};

/** Scripts */
gulp.task('scripts', function concatScripts() {
	return gulp.src(src.scripts)
			   .pipe(sourcemaps.init())
			   .pipe(concat('app.js'))
			   .pipe(sourcemaps.write())
			   .pipe(gulp.dest('public/scripts'))
			   .pipe(notify('Scripts compiled!'));
});

/** SASS */
gulp.task('sass', function compileSASS() {
	return gulp.src(src.sass)
			   .pipe(sourcemaps.init())
			   .pipe(sass(options.sass).on('error', sass.logError))
			   .pipe(postcss([
					lost(),
			   ]))
			   .pipe(autoprefixer(options.autoprefixer))
			   .pipe(sourcemaps.write())
			   .pipe(gulp.dest('public/css'))
			   .pipe(notify('SASS Compiled!'));
});

/** Watch */
gulp.task('watch', function gulpWatch() {
	gulp.watch('resources/scripts/**/*.js', ['scripts']);
	gulp.watch('resources/sass/**/*.sass', ['sass']);
});

/** Default */
gulp.task('default', ['scripts', 'sass']);
