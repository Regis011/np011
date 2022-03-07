/**
 * Webpack Configuration
 * @since 3.0.0
 */

const webpack = require( 'webpack' );
const path = require( 'path' );
const autoprefixer = require( 'autoprefixer' );
const ExtractTextPlugin = require( 'extract-text-webpack-plugin' );
const WebpackBuildNotifierPlugin = require('webpack-build-notifier');

const themeCSSPlugin = new ExtractTextPlugin( {
	filename: './assets/css/style.css',
} );

const editorCSSPlugin = new ExtractTextPlugin( {
	filename: './assets/css/editor.style.css',
} );

const shouldUseSourceMap = process.env.GENERATE_SOURCEMAP === 'true';

const notify = new WebpackBuildNotifierPlugin({
	title: "Blocks Webpack Build",
		logo: path.resolve("./img/favicon.png"),
		suppressSuccess: false,
		successSound: false
});

const devPlugins = [ themeCSSPlugin, editorCSSPlugin, notify ];

const prodPlugins = [
	themeCSSPlugin,
	editorCSSPlugin
];

// Configuration for the ExtractTextPlugin — DRY rule.
const extractConfig = {
	use: [
		// "postcss" loader applies autoprefixer to our CSS.
		{ loader: 'raw-loader' },
		{
			loader: 'postcss-loader',
			options: {
				ident: 'postcss',
				plugins: [
					autoprefixer( {
						browsers: [
							'>1%',
							'last 4 versions',
							'Firefox ESR',
							'not ie < 9',
						],
					} ),
				],
			},
		},
		// "sass" loader converts SCSS to CSS.
		// {
		// 	loader: 'sass-loader',
		// 	options: {
		// 		outputStyle: 'production' === process.env.MODE ? 'compressed' : 'nested',
		// 	},
		// },
		{
			loader: "sass-loader",
            options: {
              sourceMap: true,
              sassOptions: {
                outputStyle: 'production' === process.env.MODE ? 'compressed' : 'nested',
              },
            },
		}
	],
};

// Export configuration.
module.exports = {
	entry: {
		'./assets/js/build': path.resolve( 'src/index.js' ),
	},
	mode: process.env.MODE,
	output: {
		pathinfo: true,
		path: path.resolve( __dirname ),
		filename: '[name].js',
	},
	devtool: 'cheap-eval-source-map',
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /(node_modules|bower_components)/,
				use: {
					loader: 'babel-loader',
				}
			},
			{
				test: /style\.s?css$/,
				exclude: /(node_modules|bower_components)/,
				use: themeCSSPlugin.extract( extractConfig ),
			},
			{
				test: /editor\.s?css$/,
				exclude: /(node_modules|bower_components)/,
				use: editorCSSPlugin.extract( extractConfig ),
			},
		],
	},
	plugins: 'production' === process.env.MODE ? prodPlugins : devPlugins,
	stats: 'normal',
};
