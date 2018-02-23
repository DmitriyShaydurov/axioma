const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass');
const cssnano = require('gulp-cssnano');
const rename = require('gulp-rename');
const clean = require('gulp-clean');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');

gulp.task('minifyjs', function () {
  return gulp.src('src/js/*.js')
    .pipe(babel({
        // presets: ['es2015']
        presets: ['env']
      }))
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('build/public/js'))
    .pipe(browserSync.stream());
});

// Compile Sass & Inject Into Browser
gulp.task('sass', function () {
  return gulp.src(['node_modules/bootstrap/scss/bootstrap.scss', 'src/scss/*.scss'])
    .pipe(sass())
    .pipe(gulp.dest('build/public/css'))
    .pipe(browserSync.stream());
});

// css minification
gulp.task('cssmin', ['sass'], function () {
    return gulp.src(['build/public/css/style.css', 'build/public/css/bootstrap.css'])
      .pipe(cssnano())
      .pipe(rename({ suffix: '.min' }))
      .pipe(gulp.dest('build/public/css'));
  });

// Move JS Files to src/js
gulp.task('js', function () {
  return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js',
                  'node_modules/jquery/dist/jquery.min.js',
                  'node_modules/popper.js/dist/umd/popper.min.js'])
    .pipe(gulp.dest('build/public/js'))
    .pipe(browserSync.stream());
});

// Watch Sass & Server
gulp.task('serve', ['cssmin'], function () {
  browserSync.init({
    //server: './src'
    proxy: 'localhost/hrd/build'
  });
  gulp.watch('src/js/*.js', ['minifyjs']);
  gulp.watch(['node_modules/bootstrap/scss/bootstrap.scss', 'src/scss/*.scss'], ['cssmin']);
  gulp.watch('build/app/views/pages/*.php').on('change', browserSync.reload);
});

// Move Fonts Folder to src/fonts
gulp.task('fonts', function () {
  return gulp.src('node_modules/font-awesome/fonts/*')
    .pipe(gulp.dest('build/public/fonts'));
});

// Move Font Awesome CSS to src/css
gulp.task('fa', function () {
  return gulp.src('node_modules/font-awesome/css/font-awesome.min.css')
    .pipe(gulp.dest('build/public/css'));
});

gulp.task('clean', ['serve'], function () {
    console.log('cleaning');
    return gulp.src(['build/public/css/style.css', 'build/public/css/bootstrap.css'])
    .pipe(clean());
  });

gulp.task('default', ['js', 'clean', 'fa', 'fonts']);
