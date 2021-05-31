module.exports = {
	globDirectory: 'public/',
	globPatterns: [
		'**/*.{css,ico,js,json,png,pdf,jpg,JPG,jpeg,config}'
	],
	ignoreURLParametersMatching: [
		/^utm_/,
		/^fbclid$/
	],
	swDest: 'public/sw.js'
};