const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const HtmlWebpackPlugin = require('html-webpack-plugin');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
module.exports = {
    entry: {
        entry: './src/index.js'
    },
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
                    use: "css-loader"
                  })
            },
            {
                test:/\.(png|jpg|gif)/,
                use:[{
                    loader:'url-loader',
                    options:{
                        limit:500,
                        outputPath:'images/'
                    }
                }

                ]
            },{
                test: /\.(htm|html)$/i,
                loader: 'html-withimg-loader'
            }
        ]
    },
    plugins: [
        new HtmlWebpackPlugin({
            minify: {
                removeAttributeQuotes: true,
                collapseWhitespace:true
            },
            hash: true,
            template: './src/index.html'

        }),
        new ExtractTextPlugin("css/index.css"),
        // new UglifyJSPlugin()
    ],
    devServer: {
        contentBase: path.resolve(__dirname, 'dist'),
        host: '127.0.0.1',
        compress: true,
        port: 1111
    }
}
