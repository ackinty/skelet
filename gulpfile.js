var gulp = require('gulp'),
    less = require('gulp-less'),
    minifyCSS = require('gulp-cssnano'),
    sourcemaps = require('gulp-sourcemaps'),
    del = require('del'),
    path = require('path');

var gulpPaths = {
    LESS: './app/css/*.less',
    JS: './app/js/*.js',
    ASSETS_CSS: './app/css/assets/*.css',
    ASSETS_JS: './app/js/assets/*.js',
    MAPS: './maps',
    DEST_CSS: './public/css',
    DEST_JS: './public/js',
    DEST_ASSETS_JS: './public/js/libs'
}

/************** CSS ******************/

var lessConfig = {
    paths: [ path.join(__dirname, 'app', 'css', 'includes') ]
}

// everything in style.css
gulp.task('less', function () {
    return gulp.src(gulpPaths.LESS)
        .pipe(sourcemaps.init())
        .pipe(less(lessConfig))
        .pipe(minifyCSS())
        .pipe(sourcemaps.write(gulpPaths.MAPS))
        .pipe(gulp.dest(gulpPaths.DEST_CSS));
});

// "static" files (won't be processed)
gulp.task('assets_css', function() {
    return gulp.src(gulpPaths.ASSETS_CSS)
        .pipe(gulp.dest(gulpPaths.DEST_CSS));
});

/************** JS ******************/

gulp.task('js', function() {
    return gulp.src(gulpPaths.JS)
        .pipe(gulp.dest(gulpPaths.DEST_JS));
});

gulp.task('assets_js', function() {
    return gulp.src(gulpPaths.ASSETS_JS)
        .pipe(gulp.dest(gulpPaths.DEST_ASSETS_JS));
});

/************** RULES ******************/

gulp.task('clean', function() {
    del([gulpPaths.DEST_JS]);
    del([gulpPaths.DEST_CSS]);
});

gulp.task('default', ['clean'], function() {
    gulp.start('less', 'assets_css', 'js', 'assets_js');
});

gulp.task('watch', function() {
    // Watch .scss files
    gulp.watch(gulpPaths.LESS, ['less']);
    gulp.watch(gulpPaths.JS, ['js']);
});
