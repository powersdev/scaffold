module.exports = {
	content: [
		"{app,resources,public}/**/*.{php,twig,js}"
	],
	theme: {
		extend: {},
	},
	plugins: [require( "@tailwindcss/typography" ), require( "@tailwindcss/forms" )],
};
