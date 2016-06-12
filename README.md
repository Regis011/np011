NP011 Theme - Bootstrap 3
===

np011 is a fork of Automattic's [_s](https://github.com/Automattic/_s) WordPress starter theme that includes Gulp and Bower. 

# Pre-Installation

Basic knowledge of the command line and the following dependencies are required to use np011:

- Node ([http://nodejs.org/](http://nodejs.org/)) -`npm install`
- Gulp ([http://gulpjs.com/](http://gulpjs.com/)) - `npm install --global gulp`
- Bower ([http://bower.io/](http://bower.io/)) -`npm install -g bower`


## Manual Installation

##### 1) Navigate to the /themes folder of your project
`cd /your-project/wordpress/wp-content/themes`

##### 2) Clone

`git clone https://github.com/Regis011/np011.git`


##### 3) Install Gulp and Dependencies
- Run `npm install && bower install` from the command line to install Gulp and pull down any dependencies via Bower.

That's it! Now you can begin using Gulp.

# Usage
After you've installed np011, and run `npm install` and `gulp` from the command line you can start using gulp.

## Gulp

##### 1) Navigate to your new theme
`cd /your-project/wordpress/wp-content/themes/your-new-theme`

##### 2) Gulp tasks available:

`gulp` - Installs Bower Components and Font Awesome

`gulp watch` - Automatically handle changes to CSS, javascript, php, and image optimization. Also Livereload!

`gulp scripts` - Concatenate and minify javascript files

`gulp sass` - Compile, prefix, and minify CSS files

`gulp bower` - Install bower components

`gulp icons` - creates /fonts/ directory and adds Font Awesome font files