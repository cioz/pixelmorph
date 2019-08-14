var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var minify = require('gulp-minify');
var uglify = require('gulp-uglify');
var cleancss = require('gulp-clean-css');
var pump = require('pump');
var vinylPaths = require('vinyl-paths');
var browserSync = require('browser-sync').create();
var cssFileDesk = 'stylesDesk';
var cssFileMobile = 'stylesMobile';


/*
 |--------------------------------------------------------------------------
 | Gulpfile commands:
 |  gulp prod    // production environment
 |  gulp dev     // development environment
 |  gulp server  // Proxy Server for browser-sync
 |--------------------------------------------------------------------------
 */

var pathRoot = '../';
var pathDev = 'resources/assests/';
var pathPHP = 'resources/views/';
var pathJSprod = pathRoot + 'js/';
var pathJSdev = pathDev + 'js/';
var pathCSS = pathRoot + 'css/';
var pathSASS = pathDev + 'sass/';


gulp.task('default', ['sass']);
gulp.task('prod', ['js', 'sass', 'minifycss']);
gulp.task('dev', ['sass']);
gulp.task('sass', ['sassDesk', 'sassMobile']);


gulp.task('js', function() {
    gulp.src([
            'node_modules/jquery/dist/jquery.min.js',
            'node_modules/jquery-visible/jquery.visible.min.js',
            'resources/assets/js/materialize.min.js',
            'node_modules/nouislider/distribute/nouislider.min.js',
            'node_modules/animejs/lib/anime.min.js',
            'node_modules/plyr/dist/plyr.min.js',
            'node_modules/chart.js/dist/Chart.bundle.min.js',
            'resources/assets/js/scripts.js'
        ])
        .pipe(concat('build.js'))

    //().pipe(minify({
    //    ext: {
    //           min: '.js'
    //   },
    //   noSource: true
    // }))

    .pipe(gulp.dest(pathJSprod));
});


gulp.task('sassDesk', function() {
    console.log('Compiling now sass');
    return gulp.src('resources/assets/sass/' + cssFileDesk + '.scss')
        .pipe(vinylPaths(function(paths) {
            console.log('Compiling: ', paths);
            return Promise.resolve();
        }))
        .pipe(sass())
        .pipe(cleancss())
        .pipe(gulp.dest(pathCSS));
});
gulp.task('sassMobile', function() {
    console.log('Compiling now sass');
    return gulp.src('resources/assets/sass/' + cssFileMobile + '.scss')
        .pipe(vinylPaths(function(paths) {
            console.log('Compiling: ', paths);
            return Promise.resolve();
        }))
        .pipe(sass())
        .pipe(cleancss())
        .pipe(gulp.dest(pathCSS));
});



gulp.task('minifycss', ['sass'], function(file) {
    console.log('Minifying css');
    return gulp.src(pathCSS + 'styles.css')
        .pipe(cleancss())
        .pipe(gulp.dest(pathCSS));
});



gulp.task('serve', function() {
    console.log('Browser Sync');
    browserSync.init({
        //proxy: "localhost",
        proxy: "localhost",
        //   files: [
        //       pathCSS + '*.css',
        //       pathJSprod + '*.js'
        //   ],
        //   reloadDebounce: 2000,
        notify: false,
        cors: true,
        //    reloadDelay: 2000,
        //    reloadDebounce: 2000,
        browser: "firefox",
        port: 3303
    });


    gulp.watch('app/**/*.php', browserSync.reload);
    gulp.watch('app/config/**/*.php', browserSync.reload);
    gulp.watch('app/routes/**/*.php', browserSync.reload);
    gulp.watch('resources/**/*.scss', ['sassDesk', 'sassMobile', browserSync.reload]);
    gulp.watch('resources/**/*.js', ['js', browserSync.reload]);
    gulp.watch('resources/**/*.php', browserSync.reload);
});
