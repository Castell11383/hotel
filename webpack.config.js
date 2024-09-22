

const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
module.exports = {
  mode: 'development',
  entry: {
    'js/app' : './src/js/app.js',
    'js/inicio/index' : './src/js/inicio/index.js',
    'js/inicio' : './src/js/inicio.js',
    'js/habitaciones/index' : './src/js/habitaciones/index.js',
    'js/reservaciones/index' : './src/js/reservaciones/index.js',
    'js/cliente/index' : './src/js/cliente/index.js',
    'js/empleados/index' : './src/js/empleados/index.js',
    'js/factura/index' : './src/js/factura/index.js',

  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'public/build')
  },
  plugins: [
    new MiniCssExtractPlugin({
        filename: 'styles.css'
    })
  ],
  module: {
    rules: [
      {
        test: /\.(c|sc|sa)ss$/,
        use: [
            {
                loader: MiniCssExtractPlugin.loader
            },
            'css-loader',
            'sass-loader'
        ]
      },
      {
        test: /\.(png|svg|jpe?g|gif)$/,
        type: 'asset/resource',
      },
    ]
  }
};