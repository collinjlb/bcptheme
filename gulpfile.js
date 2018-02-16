/* / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / /
/ / Gulp dependencies
/ / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / */
var gulp = require('gulp');
var stylus = require('gulp-stylus');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var stylish = require('jshint-stylish');
var rename = require('gulp-rename');
var stripDebug = require('gulp-strip-debug');
var rupture = require('rupture');
var cleanCSS = require('gulp-clean-css');
var plumber = require('gulp-plumber');
var reload = browserSync.reload;
var beep = require('beepbeep');
var notify = require('gulp-notify');

// Configure our directories
var serverUrl = 'http://jlbdev1.net/bcpgroup/public_html';
var paths = {
  rootDir: './',
  js: './js/**/*.js',
  scriptJs: './js/scripts.js',
  jsDest: './compiled-js',
  css: './css',
  cssCompile: './compiled-css',
  cssDest: './css/style.css',
  stylus: './stylus/*.styl'
};

/* / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / /
/ / Scripts Tasks
/ / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / */
gulp.task('lint', function () {
  return gulp.src([
      paths.scriptJs
    ])
    .pipe(plumber())
    .pipe(jshint())
    .pipe(jshint.reporter(stylish))
});

gulp.task('scripts', function() {
  return gulp.src(paths.js)
    .pipe(plumber())
    // Concatenate everything within the JavaScript folder.
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest(paths.jsDest))
    .pipe(rename('scripts.min.js'))
    // Strip all debugger code out.
    .pipe(stripDebug())
    // Minify the JavaScript.
    .pipe(uglify())
    .pipe(gulp.dest(paths.jsDest));
});


/* / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / /
/ / Autoprefixer Task
/ / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / */
gulp.task('autoprefixer', function() {
  gulp.src('./css/style.css')
  .pipe(plumber())
  .pipe(sourcemaps.init())
  .pipe(autoprefixer(["last 8 version", "> 1%", "ie 8"], { map: true }))
  .pipe(sourcemaps.write('.'))
  .pipe(gulp.dest('./'))
});

/* / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / /
/ / Stylus task
/ / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / */
gulp.task('stylus', function () {
  gulp.src('./stylus/style.styl')
  .pipe(plumber({
    errorHandler: function(err) {

notify.onError({
              title: "Gulp error in task: " + err.plugin,
              message:  err.toString()
          })(err);
      beep(2)
    }
  }))
  .pipe(sourcemaps.init())
  .pipe(stylus({
    use: [rupture()],
    'include css': true
  }))
  .pipe(sourcemaps.write('.'))
  .pipe(gulp.dest('./css'))
  .pipe(browserSync.stream());
});

/* / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / /
/ / Css tasks
/ / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / */
gulp.task('compile-css', function() {
  return gulp.src(paths.cssDest)
    .pipe(plumber())
    // Concatenate everything within the JavaScript folder.
    .pipe(concat('styles.css'))
    .pipe(gulp.dest(paths.cssCompile))
    .pipe(rename('styles.min.css'))
    // Minify the CSS.
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest(paths.cssCompile));
});

/* / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / /
/ / BrowserSync task
/ / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / / */

gulp.task('browserSync', function () {
  browserSync.init({
    proxy: serverUrl,
    open: false,
    online: true
  })
});

gulp.task('watch', function () {
  gulp.watch(paths.stylus, ['stylus']);
  gulp.watch(paths.cssDest, ['autoprefixer', 'compile-css']);
});

gulp.task('watch-js', function() {
  gulp.watch(paths.js, ['lint', 'scripts']);
})

gulp.task('reload-php', function() {
  gulp.watch('./**/*.php')
  .on('change', browserSync.reload)
});

gulp.task('simpleServe', ['watch']);

gulp.task('basicServe', ['watch', 'watch-js']);

gulp.task('serve', ['scripts', 'watch', 'watch-js', 'browserSync']);

gulp.task('fullServe', ['scripts', 'watch', 'watch-js', 'reload-php', 'browserSync']);

gulp.task('default', ['scripts', 'watch', 'watch-js', 'reload-php', 'browserSync']);
