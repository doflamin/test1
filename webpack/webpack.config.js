const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const HtmlWebpackPlugin = require('html-webpack-plugin');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const glob = require('glob');
const PurifyCSSPlugin = require('purifycss-webpack');
const webpack = require('webpack');
const entry = require('./webpack_config/entry_config.js');
const CopyWebpackPlugin = require('copy-webpack-plugin');

module.exports = {
    entry:  entry,
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: '[name].js',
        publicPath: 'http://127.0.0.1:1111/'
    },
    module: {
        rules: [
            {
                test: /\.css$/,
                // use: ['style-loader', 'css-loader'],
                // use:[
                //     {
                //         loader:'style-loader'
                //     },{
                //         loader:'css-loader'
                //     }
                // ]
                use: ExtractTextPlugin.extract({
                    fallback: "style-loader",
                    use: [{
                        loader: "css-loader",
                        options: {
                            importLoader: 1
                        }
                    }, "postcss-loader"]
                })
            },
            {
                test: /\.(png|jpg|gif)/,
                use: [{
                    loader: 'url-loader',
                    options: {
                        limit: 500,
                        outputPath: 'images/'
                    }
                }

                ]
            }, {
                test: /\.(htm|html)$/i,
                loader: 'html-withimg-loader'
            }, {
                test: /\.scss$/,
                // use: ['style-loader', 'css-loader', 'sass-loader']
                use: ExtractTextPlugin.extract({
                    fallback: "style-loader",
                    use: ["css-loader", "sass-loader"]
                })

            },{
                test: /\.(js|jsx)$/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['env', 'react']

                    }
                }
            }
        ]
    },

    plugins: [
        new HtmlWebpackPlugin({
            minify: {
                removeAttributeQuotes: true,
                collapseWhitespace: true
            },
            hash: true,
            template: './src/index.html'

        }),
        new ExtractTextPlugin("css/index.css"),
        // new UglifyJSPlugin()
        new PurifyCSSPlugin({
            // Give paths to parse for rules. These should be absolute!
            paths: glob.sync(path.join(__dirname, 'src/*.html')),
          }),
          new webpack.BannerPlugin('成哥所有，翻版必究!'),
          new webpack.ProvidePlugin({
            $: 'jquery'
        }),
        new webpack.optimize.CommonsChunkPlugin({
            name: ['jquery', 'vue'],
            filename: 'assets/js/[name].js',
            minChunks: 2
        }),
        new CopyWebpackPlugin([{
            from : __dirname + '/src/public',
            to : './public'
        }])
    ],
    devServer: {
        contentBase: path.resolve(__dirname, 'dist'),
        host: '127.0.0.1',
        compress: true,
        port: 1111
    },
    watchOptions: {
        poll : 1000,
        aggregeateTimeout: 500,
        ignored: /node_modules/
    }
}
