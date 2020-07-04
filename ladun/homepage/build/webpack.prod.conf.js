const path = require('path')
const merge = require('webpack-merge')
const baseWebpackConfig = require('./webpack.base.conf')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const TerserPlugin = require('terser-webpack-plugin')

module.exports = env =>
  merge(baseWebpackConfig(env), {
    mode: 'production',
    output: {
      path: path.resolve(__dirname, '../dist/js'),
      filename: '[name].js'
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename: '../css/[name].css',
        chunkFilename: '[id].css'
      })
    ],
    optimization: {
      minimize: true,
      minimizer: [new TerserPlugin()]
    }
  })
