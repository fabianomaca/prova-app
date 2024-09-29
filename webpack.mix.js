const mix = require('laravel-mix');
const webpack = require('webpack');


mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [])
    .vue({
        version: 3,
        options: {
          compilerOptions: {
            isCustomElement: (tag) => tag.startsWith('vue-')
          }
        }
     })
     .webpackConfig({
        resolve: {
           alias: {
              vue$: 'vue/dist/vue.esm-bundler.js'
           }
        },
        plugins: [
           new webpack.DefinePlugin({
              __VUE_OPTIONS_API__: true, // Habilitar API de Options do Vue 3
              __VUE_PROD_DEVTOOLS__: false, // Desabilitar devtools em produção
              __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: true // Definir a flag que causou o erro
           })
        ]
     });