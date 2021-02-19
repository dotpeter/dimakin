//** Gulpfile Configuration **//
const { src, series, parallel, dest, watch } = require('gulp');

const
  // Modules
  gulp = require('gulp'), // Gulp of-course

  // CSS Related
  sass = require('gulp-sass'), // Gulp pluign for Sass compilation.
  concatCSS = require('gulp-concat-css'), // Concatenates css files.
  minifycss = require('gulp-uglifycss'), // Minifies CSS files.
  cleancss = require('gulp-clean-css'),
  purge = require('gulp-css-purge'),
  //cssmin = require('gulp-cssmin'),
  autoPrefixer = require('gulp-autoprefixer'), // Autoprefixing magic.
  mmq = require('gulp-merge-media-queries'), // Combine matching media queries into one media query definition.
  sourceMaps = require('gulp-sourcemaps'), // Maps code in a compressed file (E.g. style.css) back to it’s original position in a source file (E.g. structure.scss, which was later combined with other css files to generate style.css)

  // JS Related
  concat = require('gulp-concat'), // Concatenates JS files
  uglify = require('gulp-uglify'), // Minifies JS files

  // Browser Sync Related
  browserSync = require('browser-sync').create(), // Reloads browser and injects CSS. Time-saving synchronised browser testing.
  reload = browserSync.reload, // For manual browser reload.

  // Image Related
  imageMin = require('gulp-imagemin'), // Minify PNG, JPEG, GIF and SVG images with imagemin.

  // Utility Related
  notify = require('gulp-notify'), // Sends message notification to you.
  rename = require('gulp-rename'), // Renames files E.g. style.css -> style.min.css
  lineec = require('gulp-line-ending-corrector'), // Consistent Line Endings for non UNIX systems. Gulp Plugin for Line Ending Corrector (A utility that makes sure your files have consistent line endings)
  filter = require('gulp-filter'), // Enables you to work on a subset of the original files by filtering them using globbing.

  // Tranlastion Related
  wpPot = require('gulp-wp-pot'), // For generating the .pot file.
  sort = require('gulp-sort'), // Recommended to prevent unnecessary changes in pot-file.


  // Directory Locations
  dir = {
    sassSrc: './assets/sass/style.sass',
    sassWatch: './assets/sass/**/*.sass',
    cssDest: './assets/css/',
    phpSrc: './**/*.php',
    jsVendorSrc: './assets/js/vendor/*.js',
    jsCustomSrc: './assets/js/custom/*.js',
    jsDest: './assets/js/',
    jsVendorFile: 'vendor',
    jsCustomFile: 'custom',
    imgSrc: './assets/images/raw/**/*.{png,jpg,gif,svg}',
    imgDest: './assets/images/',
    projectUrl: 'localhost/dimakin'
  },

  // Tranlate Settings
  translationOptions = {
    textDomain: 'dimakin',
    destFile: 'dimakin.pot',
    destDir: './languages',
    packageName: 'dimakin',
    bugReport: 'https://crew.pt',
    lastTranslator: 'Pedro Protest <dev@crew.pt>',
    team: 'Crew <info@crew.pt>'
  },

  // CSS Settings
  cssOptions = {
    src: dir.sassSrc,
    watchdir: dir.sassWatch,
    build: dir.cssDest,
    sassOptions: {
      outputStyle: 'compact',
      precision: 10,
      errLogToConsole: true
    },
  },

  // Server Settings
  browserSyncConfig = {
    proxy: dir.projectUrl,
    port: 8000,
    open: true,
    injectChanges: true
  },

  // Autoprefixer Settings
  prefixerOptions = [
    'last 2 version',
    '> 1%',
    'ie >= 9',
    'ie_mob >= 10',
    'ff >= 30',
    'chrome >= 34',
    'safari >= 7',
    'opera >= 23',
    'ios >= 7',
    'android >= 4',
    'bb >= 10'
  ];

// - CSS Task - //
function sassCompiler() {
  sass.compiler = require('node-sass');
  return src(cssOptions.src)
    .pipe(sourceMaps.init())
    .pipe(sass(cssOptions.sassOptions).on('error', sass.logError))
    .pipe(autoPrefixer(prefixerOptions))
    .pipe(sourceMaps.write('./'))
    .pipe(gulp.dest(cssOptions.build))
    .pipe(filter('**/style.css'))
    .pipe(mmq({
      log: true
    }))
    .pipe(dest(cssOptions.build))
    .pipe(notify({
      message: 'SASS Compiled! 💯',
      onLast: true
    }));

}
exports.sassCompiler = sassCompiler;

function vendorCssConcat() {
  return src('./assets/css/vendor/*.css')
  .pipe(sourceMaps.init())
  .pipe(concatCSS('vendor.css'))
  .pipe(sourceMaps.write('./'))
  .pipe(dest('./assets/css/vendor/'))
}
exports.cssConcat = vendorCssConcat;

function cssConcat() {
  return src(['./assets/css/style.css', './assets/css/vendor/vendor.css'])
  .pipe(sourceMaps.init())
  .pipe(concatCSS('main.min.css'))
  .pipe(cleancss({compatibility: 'ie8', level: '2'}))
  .pipe(sourceMaps.write('./'))
  .pipe(autoPrefixer(prefixerOptions))  
  .pipe(lineec())
  .pipe(dest(cssOptions.build))
  .pipe(browserSync.stream())
  .pipe(browserSync.reload())
  .pipe(notify({
    message: 'CSS Concatenated! 💯',
    onLast: true
  }));
}
exports.cssConcat = cssConcat;


// - JS Vendor Task - //
function jsVendor() {
  return src(dir.jsVendorSrc)
    .pipe(concat(dir.jsVendor + '.js'))
    .pipe(rename({
      basename: dir.jsVendorFile,
      suffix: '.min'
    }))
    .pipe(uglify())
    .pipe(lineec())
    .pipe(dest(dir.jsDest))
    .pipe(notify({
      message: 'Vendors.js Completed! 💯',
      onLast: true
    }))
    .pipe(browserSync.reload({
      stream: true
    }));
}
exports.jsVendor = jsVendor;

// - JS Custom Task - //
function jsCustom() {
  return src(dir.jsCustomSrc)
    .pipe(concat(dir.jsCustomFile + '.js'))
    .pipe(rename({
      basename: dir.jsCustomFile,
      suffix: '.min'
    }))
    .pipe(uglify())
    .pipe(lineec())
    .pipe(gulp.dest(dir.jsDest))
    .pipe(notify({
      message: 'Custom.js Completed! 💯',
      onLast: true
    }))
    .pipe(browserSync.reload({
      stream: true
    }));
}
exports.jsCustom = jsCustom;

// - Images Task - //
function images() {
  return src(dir.imgSrc)
    .pipe(imageMin({
      progressive: true,
      optimizationLevel: 4, // 0-7 low-high
      interlaced: true,
      svgoPlugins: [{
        removeViewBox: false
      }]
    }))
    .pipe(dest(dir.imgDes))
    .pipe(notify({
      message: 'Images Completed! 💯',
      onLast: true
    }));
}
exports.images = images;

// - Translate - //
function translate() {
  return src(dir.phpSrc)
    .pipe(sort())
    .pipe(wpPot({
      domain: translationOptions.textDomain,
      package: translationOptions.packageName,
      bugReport: translationOptions.bugReport,
      lastTranslator: translationOptions.lastTranslator,
      team: translationOptions.team
    }))
    .pipe(dest(translationOptions.destDir + '/' + translationOptions.destFile))
    .pipe(notify({
      message: 'Translation Completed! 💯',
      onLast: true
    }));
}
exports.translate = translate;

// - Server Task (Private) - //
function server(done) {
  if (browserSync) browserSync.init(browserSyncConfig);
  done();
}

// - Watch Task - //
function watchTask(done) {
  watch(cssOptions.watchdir, series(sassCompiler, cssConcat)); // CSS changes
  watch(dir.phpSrc).on('change', reload); // PHP changes
  watch(dir.jsVendorSrc, jsVendor).on('change', jsVendor); // JS Vendor changes
  watch(dir.jsCustomSrc, jsCustom).on('change', jsCustom); // JS Custom changes
  done();
}

//** Default Tasks **//
exports.default = series( parallel(jsVendor, jsCustom, translate ), vendorCssConcat, sassCompiler, cssConcat, watchTask, server);