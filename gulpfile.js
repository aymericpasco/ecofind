var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var cssmin = require('gulp-cssmin');

var AUTOPREFIXER_BROWSERS = [];

var sass = require('gulp-sass');

gulp.task('sass', function () {
    return gulp.src('./resources/assets/sass/**/*.sass')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'expanded'
        }).on('error', sass.logError))
        .pipe(autoprefixer(AUTOPREFIXER_BROWSERS))
        //.pipe(cssmin())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./public/css'));
});

gulp.task('sass:watch', function () {
    gulp.watch('./resources/assets/sass/**/*.sass', ['sass']);
});