NP011 Theme - Bootstrap 4
===

np011 is a fork of Automattic's [_s](https://github.com/Automattic/_s) and [Understrap](https://understrap.com/) WordPress starter theme that includes Gulp and Bower.

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
After you've installed np011, and run `npm install` and `gulp` from the command line you can start using theme.

## Gulp

##### 1) Navigate to your new theme
`cd /your-project/wordpress/wp-content/themes/your-new-theme`

##### 2) Gulp tasks available:

`gulp` - Installs Bower Components and Font Awesome

`gulp dev` - Automatically handle changes to CSS, javascript, php, and image optimization. Also Livereload!

`gulp dev-bs` - Also Livereload(Browser-Sync)! First change the browser-sync options in /gulpconfig.json. Change "localhost/theme_test/" with your environment.
