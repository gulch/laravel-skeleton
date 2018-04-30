var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var nano = require('gulp-cssnano');
var discard_comments = require('postcss-discard-comments');
var combine_duplicated_selectors = require('postcss-combine-duplicated-selectors');
var sorting = require('postcss-sorting');
var sass = require('gulp-sass');

var APP_VERSION = '1.0.0';
var BUILD_PATH = 'public/build/' + APP_VERSION + '/';
var VENDOR_ASSETS_PATH = 'resources/assets/vendor/';
var JS_ASSETS_PATH = 'resources/assets/js/';
var CSS_ASSETS_PATH = 'resources/assets/css/';
var SASS_ASSETS_PATH = 'resources/assets/sass/';

function frontendCss() {
    return gulp.src(SASS_ASSETS_PATH + 'frontend.sass')
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('f.css'))
        .pipe(postcss([
            discard_comments({removeAll: true}),
            combine_duplicated_selectors(),
            autoprefixer({
                browsers: [
                    'last 2 versions',
                    'not ie < 11',
                    'Safari >= 8'
                ]
            }),
            sorting()
        ]))
        /*.pipe(nano())*/
        .pipe(gulp.dest(BUILD_PATH));
}

function frontendJs() {
    return gulp.src(JS_ASSETS_PATH + 'frontend.js')
        .pipe(concat('f.js'))
        /*.pipe(uglify())*/
        .pipe(gulp.dest(BUILD_PATH));
}

gulp.task('frontendCss', gulp.parallel(frontendCss));
gulp.task('frontendJs', gulp.parallel(frontendJs));
gulp.task('build', gulp.parallel(frontendCss, frontendJs));