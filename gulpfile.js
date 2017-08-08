/* AFIN DE NE PAS AVOIR DE PROBLEMES : PENSER A 
npm install es6-promise --save-dev

Si problèmes avec SASS :
npm install gulp-sass

 */
require('es6-promise').polyfill();
var gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    autoprefixer = require('autoprefixer'),
	postcss = require('gulp-postcss'),
	sourcemaps = require('gulp-sourcemaps'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    cssnano = require('cssnano'),
    combineMq = require('gulp-combine-mq'),
    sass = require('gulp-sass'),
    banner = require('gulp-banner'),
    watch = require('gulp-watch');

var comment = '/* \nTheme Name: Henelia WP Theme \nAuthor: www.henelia.fr \nDescription: Coquille vide à utiliser pour toute installation de projet Henelia \nVersion: 1.1 \n*/\n';

gulp.task('styles', function(){
	var processors = [
	    autoprefixer({browsers: ['last 2 version']}),
	    cssnano(),
	];

  gulp.src(['css/**/*.scss'])
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(combineMq({
        beautify: true
    }))    
    .pipe(postcss(processors))
    .pipe(banner(comment))
    .pipe(sourcemaps.write(''))
    .pipe(gulp.dest(''))
});

gulp.task('scripts', function(){
    return gulp.src([

        'scripts/vendor/modernizr.js',

      	// Bootstrap
        // 'scripts/vendor/bootstrap/affix.js',
        'scripts/vendor/bootstrap/transition.js',
        // 'scripts/vendor/bootstrap/alert.js.js',
        // 'scripts/vendor/bootstrap/button.js',
        'scripts/vendor/bootstrap/carousel.js',
        'scripts/vendor/bootstrap/collapse.js',
        'scripts/vendor/bootstrap/dropdown.js',
        // 'scripts/vendor/bootstrap/modal.js',
        // 'scripts/vendor/bootstrap/tooltip.js',
        // 'scripts/vendor/bootstrap/popover.js',
        // 'scripts/vendor/bootstrap/scrollspy.js',
        //'scripts/vendor/bootstrap/tab.js',

        // LightGallery
        'scripts/vendor/lightGallery/lightgallery.min.js',
        // 'scripts/vendor/lightGallery/lg-autoplay.min.js',
        // 'scripts/vendor/lightGallery/lg-fullscreen.min.js',
        // 'scripts/vendor/lightGallery/lg-hash.min.js',
        // 'scripts/vendor/lightGallery/lg-pager.min.js',
        // 'scripts/vendor/lightGallery/lg-thumbnail.min.js',
        // 'scripts/vendor/lightGallery/lg-video.min.js',
        // 'scripts/vendor/lightGallery/lg-zoom.min.js',

        // Project
        'scripts/cookie.js',
        'scripts/scripts.js', 
  	])
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(concat('scripts.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('scripts/'))
});

gulp.task('watch', function(){
  gulp.watch("css/**/*.scss", ['styles']);
  gulp.watch("scripts/**/*.js", ['scripts']);
});