var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');

    mix.styles([
    		'app.css'
    	], 'public/css/styles.css', 'public/css'); 

    mix.scripts([
    		'scripts.js'
    	], 'public/js/scripts.js');
    
    mix.version(['public/css/styles.css', 'public/js/scripts.js']);


    //mix.phpUnit();
});
