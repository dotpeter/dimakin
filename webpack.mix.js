let mix = require("laravel-mix");

mix
  .js("assets/js/app.js", "dist")
  .sass("assets/sass/style.sass", "./")
  .setPublicPath("dist")
  .setResourceRoot("./")
  .disableNotifications()
  .browserSync({
    proxy: "localhost/dimakin",
    files: ["./**/*.php", "./dist/*.js", "./dist/*.css"]
  });

if (!mix.inProduction()) {
  mix
    .webpackConfig({
      devtool: "source-map"
    })
    .sourceMaps();
}

if (mix.inProduction()) {
  mix.version();
}