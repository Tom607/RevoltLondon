const package = require("./package.json");

const gulp = require("gulp");
const sass = require("gulp-sass");
const browserSync = require("browser-sync").create();
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const rename = require("gulp-rename");
const svgmin = require("gulp-svgmin");
const svgstore = require("gulp-svgstore");
const cheerio = require("gulp-cheerio");
const webp = require("gulp-webp");
const imagemin = require("gulp-imagemin");
const imageminPngquant = require("imagemin-pngquant");
const imageminMozjpeg = require("imagemin-mozjpeg");
const cssnano = require("cssnano");
const uglify = require("gulp-uglify");
const babel = require("gulp-babel");
const concat = require("gulp-concat");
const order = require("gulp-order");
const sourcemaps = require("gulp-sourcemaps");

const zip = require("gulp-zip");

// Development Tasks
// -----------------

// Start browserSync server
gulp.task("browserSync", () => {
  browserSync.init({
    proxy: "revolt-working.local",
    browser: "google chrome",
    notify: false,
  });

  gulp.watch("./_src/scss/**/**/*.scss", gulp.parallel("sass"));
  gulp.watch(["./**/*.php", "./**/*.css"]).on("change", browserSync.reload);
  gulp.watch("./_src/js/**/**/*.js", gulp.parallel("scripts"));
  gulp.watch("./_src/js/vendor/*.js", gulp.parallel("libs"));
});

gulp.task("sass", () => {
  return gulp
    .src("./_src/scss/style.scss")
    .pipe(sourcemaps.init())
    .pipe(sass().on("error", sass.logError))
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(rename("style.min.css"))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest("./"))
    .pipe(browserSync.stream());
});

gulp.task("fonts", () => {
  return gulp.src("./_src/fonts/**/*").pipe(gulp.dest("./assets/fonts"));
});

gulp.task("scripts", () => {
  return gulp
    .src(["./_src/js/**/*", "!./_src/js/vendor/**/*"])
    .pipe(concat("main.js"))
    .pipe(rename("main.min.js"))
    .pipe(babel({ presets: ["@babel/env"] }))
    .pipe(uglify())
    .pipe(gulp.dest("./assets/js/"))
    .pipe(browserSync.stream());
});

gulp.task("libs", () => {
  return gulp
    .src(["./_src/js/vendor/*.js", "!./_src/js/vendor/jquery-3.3.1.min.js"])
    .pipe(concat("libs.min.js"))
    .pipe(gulp.dest("./assets/js/"))
    .pipe(browserSync.stream());
});

// Watchers
gulp.task("watch", gulp.series("sass", "libs", "scripts", "browserSync"));

// Build
gulp.task("build", gulp.series("sass", "libs", "scripts"));

// Optimization Tasks
gulp.task("webp", () =>
  gulp
    .src("./_src/images/*.{jpg,png}")
    .pipe(webp())
    .pipe(gulp.dest("./assets/images/"))
);

gulp.task("imagemin", () =>
  gulp
    .src("./_src/images/*.{jpg,png}")
    .pipe(
      imagemin(
        [
          (imageminPngquant({
            speed: 1,
            quality: 98, // lossy settings
          }),
          imageminMozjpeg({
            quality: 90,
          })),
        ],
        {
          verbose: true,
        }
      )
    )
    .pipe(gulp.dest("./assets/images/"))
);

// ZIP Theme
gulp.task("zip", function(done) {
  gulp
    .src(["!./{node_modules/, node_modules/**}", "!.gitignore", "!./git/**/*", "**/*"])
    .pipe(zip(package.name + ".zip"))
    .pipe(gulp.dest("./"));

  done();
});
