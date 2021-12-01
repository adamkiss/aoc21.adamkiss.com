const colors = require('tailwindcss/colors')
const defaultConfig = require('tailwindcss/defaultConfig')
const plugin = require('tailwindcss/plugin')

module.exports = {
	darkMode: 'media',
	theme: {
		screens: {
			'xs': '400px',
			...defaultConfig.theme.screens
		},
		extend: {
			colors: {
				toxic: '#cff92f',
				gray: colors.neutral,
			}
		}
	},
	variants: {
		extend: {
			backgroundColor: ['act']
		}
	},
	plugins: [
		plugin(({addVariant, e}) => {
			addVariant('act', ({ modifySelectors, separator }) => {
				modifySelectors(({ className }) => `.${e(`act${separator}${className}`)}[data-active]`)
			})
			addVariant('js', ({ modifySelectors, separator }) => {
				modifySelectors(({ className }) => `.js .${e(`js${separator}${className}`)}`)
			})
			addVariant('no-js', ({ modifySelectors, separator }) => {
				modifySelectors(({ className }) => `.no-js ${e(`no-js${separator}${className}`)}`)
			})
		})
	],
	corePlugins: {
		container: false,
	},
	content: [
		'./content/**/*.txt',
		'./site/layouts/**/*.php',
		'./site/templates/**/*.php',
		'./site/snippets/**/*.php',
		'./assets/**/*.js'
	],
	options: {
		safelist: [/^styled-html/]
	},
}
