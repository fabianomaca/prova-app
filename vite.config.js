import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
	plugins: [
		vue(),
		laravel({
			input: ['resources/css/app.css', 'resources/js/app.js'],
			refresh: true,
		}),
	],

	define: {
		__VUE_OPTIONS_API__: true, // Ativa a API Options do Vue
		__VUE_PROD_DEVTOOLS__: false, // Desativa devtools em produção
		__VUE_PROD_HYDRATION_MISMATCH_DETAILS__: true // Define a flag específica
	 },

	resolve: {
		alias: {
			vue: 'vue/dist/vue.ems-bundler.js'
		}
	}
});
