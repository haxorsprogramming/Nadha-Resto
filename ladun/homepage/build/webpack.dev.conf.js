const webpack = require('webpack')
const path = require('path')
const merge = require('webpack-merge')
const baseWebpackConfig = require('./webpack.base.conf')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')

module.exports = env =>
  merge(baseWebpackConfig(env), {
    mode: 'development',
    output: {
      path: path.resolve(__dirname, '../dist/js'),
      filename: '[name].js'
    },
    plugins: [
      new BrowserSyncPlugin({
        host: 'localhost',
        port: 3000,
        files: ['./*.html'],
        server: { baseDir: ['./'] }
      }),
      new MiniCssExtractPlugin({
        filename: '../css/[name].css',
        chunkFilename: '[id].css'
      })
    ],
    watch: true,
    devServer: {
      stats: 'errors-only'
    }
  })
