'use strict'; // eslint-disable-line

const UglifyJsPlugin = require('uglifyjs-webpack-plugin');


module.exports = {
  plugins: [
    new UglifyJsPlugin({
      uglifyOptions: {
        ecma: 5,
        compress: {
          warnings: true,
          drop_console: true,
        },
      },
    }),
  ],
};
