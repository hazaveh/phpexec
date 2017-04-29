# phpExec 1.4

Write your php code in browser and see the result instantly. This package ships with a simple command line tool uitilizing php built-in web server.

 * Override php.ini variables by editing config file.
 * Include your own classes and php files
 * Execute any php code without limitation of online php compilers.
 * Save your codes as snippets for future execution.
 * Manage Snippets


Installation is easy. clone this repo and run **composer install** to download dependencies.

![Image of Yaktocat](http://blog.hazaveh.net/wp-content/uploads/phpexec-2.png)

The symfony var_dumper is loaded with the project. feel free to use it within your code for a happier life.

### Install Additional Composer Packages

You can pull in any composer package. The package will be accessible in the editor automatically. There is no need for including autoload.php file.

# Warning!
Only use this on restricted access sites or local environment. If access to this script is exposed to unauthorized users they  may execute code that compromise your security.

[phpExec](https://labs.hazaveh.net/phpexec) Official Page.

### Stuff used to make this:

 * Bootstrap 3
 * Ace Editor
 * jQuery
 * Symfony Console Component
 * VueJS
