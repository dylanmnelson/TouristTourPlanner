module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		
		// Project info.
		project: {
			src: 'src',
			css: '<%= project.src %>/css',
			js: '<%= project.src %>/js'
		},
		
		/**
		 * Compress CSS files
		 * https://github.com/gruntjs/grunt-contrib-cssmin
		 */
		cssmin: {
			css: {
				src: '<%= project.css %>/main.css',
				dest: '<%= project.css %>/main.min.css'
			}
		},
		
		/**
		 * Uglify (minify) JavaScript files
		 * https://github.com/gruntjs/grunt-contrib-uglify
		 * Compresses and minifies the library JS files into one, and all the custom JS files into one
		 */
		uglify: {
			custom: {
				src: '<%= project.js %>/custom.js',
				dest: '<%= project.js %>/custom.min.js'
			}
		}
	});

	// Load the required plugins.
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	// Default task(s).
	grunt.registerTask('default', ['cssmin','uglify']);

};