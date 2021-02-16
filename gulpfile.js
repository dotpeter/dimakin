//** Gulpfile Configuration **//
const
  // Modules
  gulp = require('gulp'), // Gulp of-course

  // CSS Related
  sass = require('gulp-sass'), // Gulp pluign for Sass compilation.
  concatCSS = require('gulp-concat-css'), // Concatenates css files.
  minifycss = require('gulp-uglifycss'), // Minifies CSS files.
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
    watch: dir.sassWatch,
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
  return gulp.src(cssOptions.src)
    .pipe(sourceMaps.init())
    .pipe(sass(cssOptions.sassOptions).on('error', sass.logError))
    .pipe(sourceMaps.write({
      includeContent: false
    }))
    .pipe(sourceMaps.init({
      loadMaps: true
    }))
    .pipe(autoPrefixer(prefixerOptions))
    .pipe(sourceMaps.write('./'))
    .pipe(lineec())
    .pipe(gulp.dest(cssOptions.build))
    .pipe(filter('**/style.css'))
    .pipe(mmq({
      log: true
    }))
    .pipe(browserSync.stream())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(minifycss({
      maxLineLen: 10
    }))
    .pipe(lineec())
    .pipe(gulp.dest(cssOptions.build))
    .pipe(filter('**/*.css'))
    .pipe(browserSync.reload({
      stream: true
    }))
    .pipe(notify({
      message: 'TASK: CSS Completed! 💯',
      onLast: true
    }));

}
exports.sassCompiler = gulp.series(sassCompiler);



function cssConcat() {
  return gulp.src(['assets/css/**/*.css', '!assets/css/admin-login.css', '!assets/css/style.min.css'])
  .pipe(concatCSS('main.css'))
  .pipe(filter('**/main.css'))
  .pipe(autoPrefixer(prefixerOptions))
  .pipe(minifycss({
    maxLineLen: 0,
    uglyComments: true
  }))
  .pipe(lineec())
  .pipe(rename({
    suffix: '.min'
  }))
  .pipe(gulp.dest(cssOptions.build))
  .pipe(browserSync.reload({
    stream: true
  }))
  .pipe(notify({
    message: 'CSS Concatenated! 💯',
    onLast: true
  }));
}

exports.cssConcat = gulp.series(cssConcat);

// - JS Vendor Task - //
function jsVendor() {
  return gulp.src(dir.jsVendorSrc)
    .pipe(concat(dir.jsVendor + '.js'))
    .pipe(rename({
      basename: dir.jsVendorFile,
      suffix: '.min'
    }))
    .pipe(uglify())
    .pipe(lineec())
    .pipe(gulp.dest(dir.jsDest))
    .pipe(notify({
      message: 'TASK: Vendors.js Completed! 💯',
      onLast: true
    }))
    .pipe(browserSync.reload({
      stream: true
    }));
}
exports.jsVendor = gulp.series(jsVendor);

// - JS Custom Task - //
function jsCustom() {
  return gulp.src(dir.jsCustomSrc)
    .pipe(concat(dir.jsCustomFile + '.js'))
    .pipe(rename({
      basename: dir.jsCustomFile,
      suffix: '.min'
    }))
    .pipe(uglify())
    .pipe(lineec())
    .pipe(gulp.dest(dir.jsDest))
    .pipe(notify({
      message: 'TASK: Custom.js Completed! 💯',
      onLast: true
    }))
    .pipe(browserSync.reload({
      stream: true
    }));
}
exports.jsCustom = gulp.series(jsCustom);

// - Images Task - //
function images() {
  return gulp.src(dir.imgSrc)
    .pipe(imageMin({
      progressive: true,
      optimizationLevel: 4, // 0-7 low-high
      interlaced: true,
      svgoPlugins: [{
        removeViewBox: false
      }]
    }))
    .pipe(gulp.dest(dir.imgDes))
    .pipe(notify({
      message: 'TASK: Images Completed! 💯',
      onLast: true
    }));
}
exports.images = gulp.series(images);

// - Translate - //
function translate() {
  return gulp.src(dir.phpSrc)
    .pipe(sort())
    .pipe(wpPot({
      domain: translationOptions.textDomain,
      package: translationOptions.packageName,
      bugReport: translationOptions.bugReport,
      lastTranslator: translationOptions.lastTranslator,
      team: translationOptions.team
    }))
    .pipe(gulp.dest(translationOptions.destDir + '/' + translationOptions.destFile))
    .pipe(notify({
      message: 'TASK: Translation Completed! 💯',
      onLast: true
    }));
}
exports.translate = gulp.series(translate);

// - Server Task (Private) - //
function server(done) {
  if (browserSync) browserSync.init(browserSyncConfig);
  done();
}

// - Watch Task - //
function watch(done) {
  gulp.watch(cssOptions.watch, sassCompiler); // CSS changes
  gulp.watch(dir.phpSrc).on('change', reload); // PHP changes
  gulp.watch(dir.jsVendorSrc, jsVendor).on('change', jsVendor); // JS Vendor changes
  gulp.watch(dir.jsCustomSrc, jsCustom).on('change', jsCustom); // JS Custom changes
  done();
}

//** Default Tasks **//
exports.default = gulp.series(exports.sassCompiler, exports.jsVendor, exports.jsCustom, exports.translate, exports.cssConcat, watch, server);