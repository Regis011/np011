NP011 starter theme with webpack and bootstrap 4
===

np011 is a fork of Automattic's [_s](https://github.com/Automattic/_s) and [Understrap](https://understrap.com/) WordPress starter theme that includes Webpack, Boostrap 4 and DOM-based Routing for JavaScript.

# Pre-Installation

Basic knowledge of the command line and the following dependencies are required to use np011:

- Node ([http://nodejs.org/](http://nodejs.org/))

## Manual Installation

##### 1) Navigate to the /themes folder of your project
`cd /your-project/wordpress/wp-content/themes`

##### 2) Clone

`git clone https://github.com/Regis011/np011.git`

##### 3) Navigate to your new theme
`cd /your-project/wordpress/wp-content/themes/your-new-theme`

##### 4) Install Webpack and all Dependencies
- Run `npm install` from the command line to install dependecy and pull down any dependency via npm.

That's it! Now you can begin using webpack and all dependency.

##### 5) Usage Watch
After you've installed np011 theme and run `npm install` from the command line you can start using themes and watch your changes throw the `npm run dev`.

## For production environments

run `npm run build`
