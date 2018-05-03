var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var nano = require('gulp-cssnano');
var discard_comments = require('postcss-discard-comments');
var combine_duplicated_selectors = require('postcss-combine-duplicated-selectors');
var sorting = require('postcss-sorting');

var APP_VERSION = '1.0.0';
var BUILD_PATH = 'public/build/' + APP_VERSION + '/';
var VENDOR_ASSETS_PATH = 'resources/assets/vendor/';
var JS_ASSETS_PATH = 'resources/assets/js/';
var CSS_ASSETS_PATH = 'resources/assets/css/';
var SEMANTIC_PATH = VENDOR_ASSETS_PATH + 'semantic/2.3.1/';
var SEMANTIC_COMPONENTS_PATH = SEMANTIC_PATH + 'components/';

function frontendCss() {
    return gulp.src(CSS_ASSETS_PATH + 'frontend.css')
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

function semanticCss() {
    return gulp.src([
        SEMANTIC_COMPONENTS_PATH + 'reset.css',
        SEMANTIC_COMPONENTS_PATH + 'site.css',
        SEMANTIC_COMPONENTS_PATH + 'button.css',
        SEMANTIC_COMPONENTS_PATH + 'checkbox.css',
        SEMANTIC_COMPONENTS_PATH + 'divider.css',
        SEMANTIC_COMPONENTS_PATH + 'form.css',
        SEMANTIC_COMPONENTS_PATH + 'grid.css',
        SEMANTIC_COMPONENTS_PATH + 'header.css',
        SEMANTIC_COMPONENTS_PATH + 'input.css',
        SEMANTIC_COMPONENTS_PATH + 'label.css',
        SEMANTIC_COMPONENTS_PATH + 'message.css',
        SEMANTIC_COMPONENTS_PATH + 'segment.css',
        CSS_ASSETS_PATH + 'overrides/semantic/icon.css'
    ])
        .pipe(concat('smntc.css'))
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

function semanticFonts()
{
    return gulp.src(SEMANTIC_PATH + 'themes/default/assets/fonts/*')
        .pipe(gulp.dest(BUILD_PATH));
}

function jQueryJs() {
    return gulp.src(VENDOR_ASSETS_PATH + 'jquery/3.3.1/jquery.js')
        .pipe(concat('jqr.js'))
        .pipe(uglify())
        .pipe(gulp.dest(BUILD_PATH));
}

gulp.task('frontendCss', gulp.parallel(frontendCss));
gulp.task('frontendJs', gulp.parallel(frontendJs));
gulp.task('semantic', gulp.parallel(semanticCss, semanticFonts));
gulp.task('jQueryJs', gulp.parallel(jQueryJs));

gulp.task('build', gulp.parallel(frontendCss, frontendJs, semanticCss, semanticFonts, jQueryJs));