//js/app.js

//Require SASS
require('../style.scss');

//Require CSS
require('../../style.css');

//Require Slick
require('script-loader!../../node_modules/slick-carousel/slick/slick');

console.log('main.js!');

// import external dependencies
import 'jquery';

//import customizer
import './customizer';

//import navigation scripts
import './navigation';

// Import everything from autoload
import './autoload/autoloader'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
