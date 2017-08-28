let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

mix.combine([
	'public/js/jquery-migrate.min-1.4.1.js',
	'public/js/bootstrap-3.3.7.js',
	'public/js/spin.min-2.3.2.js',
	'public/js/jquery.introLoader.min-1.7.1.js',
	'public/js/jquery.waypoints.min-4.0.0.js',
	'public/js/jquery.slicknav.min.js',
	'public/js/jquery.placeholder.min.js',
	'public/js/jquery.easy-autocomplete.min.js',
	'public/js/slick.min.js',
	'public/js/jquery.responsivegrid.min.js',
	'public/js/jquery-easing.min.js',
	'public/js/bootstrap-select.min.js',
	'public/js/bootstrap-modal.js',
	'public/js/bootstrap-modalmanager.js',
	'public/js/blazy.min.js',
	'public/js/custom.js',
	], 'public/js/appp.js')
.combine([
	'public/css/main.css',
	'public/css/icons.css',
	'public/css/font-awesome.min.css',
	'public/css/component.css',
	'public/css/style.css',
	'public/css/custom.css',
	], 'public/css/appp.css');



    


