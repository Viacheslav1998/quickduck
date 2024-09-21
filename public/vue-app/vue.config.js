const path = require('path');

module.exports = {
  outputDir: path.resolve(__dirname, '../vue'),
  devServer: {
    proxy: {
      '/api': {
        target: 'http://quickduck.com',
        changeOrigin: true
      }
    }
  }
};
