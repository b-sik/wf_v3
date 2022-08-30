'use strict'; // eslint-disable-line

const UglifyJsPlugin = require('uglifyjs-webpack-plugin');


module.exports = {
  plugins: [
    new UglifyJsPlugin({
      sourceMap: true,
      uglifyOptions: {
        ecma: 5,
        compress: true,
      },
    }),
  ],
};
