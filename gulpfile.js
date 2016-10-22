const gulp = require("gulp");
const sass = require("gulp-sass");
const autoprefixer = require("gulp-autoprefixer");
const babelify = require('babelify');
const browserify = require("browserify");
const source = require("vinyl-source-stream");
const image = require('gulp-image');

gulp.task("sass", function() {
  gulp.src("src/Style/index.scss")
    .pipe(sass())
    .pipe(autoprefixer())
    .pipe(gulp.dest("./webroot/css"));
});

gulp.task('script', function() {
  browserify({entries: ["./src/Script/main.js"]})
    .transform(babelify, {presets: ['es2015']})
    .bundle()
    .pipe(source("main.js"))
    .pipe(gulp.dest("./webroot/js"))
});

gulp.task('image', function () {
  gulp.src('src/Image/**/*')
    .pipe(image())
    .pipe(gulp.dest('./webroot/img'));
});

gulp.task('watch', function () {
    gulp.watch('src/Style/**/*.scss', ['sass']);
    gulp.watch('src/Script/**/*.js', ['script']);
    gulp.watch('src/Image/**/*', ['image']);
});

gulp.task('default', ['sass','script','image','watch']);