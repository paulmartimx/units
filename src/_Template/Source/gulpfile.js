/*jshint esversion: 6 */

const   gulp = require('gulp'),
        
        //RollupJS
        rollup = require('rollup'),
        babel = require('rollup-plugin-babel'),
        resolveNodeModules = require('rollup-plugin-node-resolve'),
        commonJs = require('rollup-plugin-commonjs'),
        replace = require('rollup-plugin-replace'),
        {terser} = require('rollup-plugin-terser'),
        alias = require('rollup-plugin-alias'),

        // CSS
        sass = require('gulp-sass'),
        cssnano = require('gulp-cssnano'),

        // Utils
        plumber = require('gulp-plumber'),
        notify = require('gulp-notify'),        
        sourcemaps = require('gulp-sourcemaps'),        
        rename = require("gulp-rename");


var module_name = "%UnitHint%";
var sass_vendor_entrypoint = './vendor.scss';
var sass_entrypoint = './main.scss';
var public_dir = '../../../../public/app_units/';
var js_entrypoint = './main.js';
var js_vendor_entrypoint = './vendor.js';


const rollupJS = done => {

  return rollup.rollup({
      input: js_entrypoint,
      plugins: [        
        babel(),
        resolveNodeModules({
          mainFields: ['main']
        }),
        commonJs(),
        terser()
      ]      
    }).then(bundle => {
      return bundle.write({
        file: './public/js/' + module_name + '.js',
        format: 'iife',
        name: module_name,
        sourcemap: true
      });
    });

};


const js_vendor = done => {

  return rollup.rollup({
      input: js_vendor_entrypoint,
      plugins: [        
        babel(),
        resolveNodeModules({
          mainFields: ['main']
        }),
        commonJs(),
        terser()
      ]
    }).then(bundle => {
      return bundle.write({
        file: './public/js/vendor.js',
        format: 'iife',
        name: 'vendor',
        sourcemap: true        
      });
    });

};


const css = (done) => {
  
  gulp.src(sass_entrypoint)
      .pipe(plumber({errorHandler: notify.onError("Error: <%= error %> <%= error.message %>")}))
      .pipe(sourcemaps.init())
      .pipe(sass())
      .pipe(rename(module_name + '.css'))
      .pipe(cssnano({zindex: false}))
      .pipe(sourcemaps.write('.'))
      .pipe(notify({message: 'SASS compilado.', onLast: true}))
      .pipe(gulp.dest( './public/css' ))
      .pipe(gulp.dest(public_dir + module_name + '/css' ));

  done();

};

const css_vendor = (done) => {
  
  gulp.src(sass_vendor_entrypoint)
      .pipe(plumber({errorHandler: notify.onError("Error: <%= error %> <%= error.message %>")}))
      .pipe(sourcemaps.init())
      .pipe(sass())
      .pipe(rename('vendor.css'))
      .pipe(cssnano({zindex: false}))
      .pipe(sourcemaps.write('.'))
      .pipe(notify({message: 'VENDOR SASS compilado.', onLast: true}))
      .pipe(gulp.dest( './public/css' ))
      .pipe(gulp.dest(public_dir + module_name + '/css' ));

  done();

};

const public = (done) => {
  gulp.src('./public/**/*')
      .pipe(notify({message: 'Archivos Públicos copiados.', onLast: true}))
      .pipe(gulp.dest(public_dir + module_name ));

  done();
};


const dist = (done) => {
  gulp.src('./public/**/*')
      .pipe(notify({message: 'Archivos copiados a ../SourceDist.', onLast: true}))
      .pipe(gulp.dest( '../SourceDist' ));
  done();
};

gulp.task('default', gulp.series(css, rollupJS, public, dist));
gulp.task('vendor', gulp.series(css_vendor, js_vendor, public, dist));

gulp.task("watch", gulp.series(css, rollupJS, public, dist, (done) => {

    // Compile SASS
    gulp.watch([
                sass_entrypoint,
                "scss/**/*.scss",
                "scss/**/*.sass"
                ], {cwd:'./'}, gulp.series(css));

    // Compile JS
    gulp.watch([
                js_entrypoint,
                "js/**/*.js"
                ], {cwd:'./'}, gulp.series(rollupJS));

    // Publish compiled assets
    gulp.watch(["public/**/*"], {cwd:'./'}, gulp.series(public, dist));

    done();

}));
