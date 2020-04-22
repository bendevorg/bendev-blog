const webpack = require('webpack');
const path = require('path');
const HardSourceWebpackPlugin = require('hard-source-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const AssetsPlugin = require('assets-webpack-plugin');

module.exports = {
  resolve: {
    extensions: ['*', '.js', '.jsx', '.json'],
    alias: {
      'react-dom': '@hot-loader/react-dom',
    },
  },
  devtool: 'cheap-module-eval-source-map',
  entry: [
    path.resolve(__dirname, 'src/index.js'),
  ],
  target: 'web',
  mode: 'development',
  output: {
    path: path.resolve(__dirname, 'build'),
    publicPath: '/',
    filename: 'index.js',
  },
  plugins: [
    new HardSourceWebpackPlugin(),
    new webpack.HotModuleReplacementPlugin(),
    new webpack.NoEmitOnErrorsPlugin(),
    new MiniCssExtractPlugin({
      filename: 'index.css',
    }),
    new AssetsPlugin({
      path: path.resolve(__dirname, 'build'),
      filename: 'webpack-manifest.json',
    }),
  ],
  module: {
    rules: [
      {
        test: /\.jsx?$/,
        exclude: /node_modules/,
        use: ['babel-loader'],
      },
      {
        test: /\.eot(\?v=\d+.\d+.\d+)?$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[path][name].[ext]',
            },
          },
        ],
      },
      {
        test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'url-loader',
            options: {
              limit: 10000,
              mimetype: 'application/font-woff',
            },
          },
        ],
      },
      {
        test: /\.[ot]tf(\?v=\d+.\d+.\d+)?$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'url-loader',
            options: {
              limit: 10000,
              mimetype: 'application/octet-stream',
            },
          },
        ],
      },
      {
        test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'url-loader',
            options: {
              limit: 10000,
              mimetype: 'image/svg+xml',
            },
          },
        ],
      },
      {
        test: /\.(jpe?g|png|gif|ico|svg)$/i,
        exclude: /node_modules/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[path][name].[ext]',
            },
          },
        ],
      },
      {
        test: /(\.css|\.scss|\.sass)$/,
        exclude: /node_modules/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              sourceMap: true,
            },
          },
          {
            loader: 'postcss-loader',
            options: {
              plugins: () => [require('autoprefixer')],
              sourceMap: true,
            },
          },
          {
            loader: 'sass-loader',
            options: {
              sassOptions: {
                includePaths: [path.resolve(__dirname, 'src')],
              },
              sourceMap: true,
            },
          },
        ],
      },
    ],
  },
};
