module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		
		// Project info.
		project: {
			src: 'src',
			app: 'dist',
			css: {
				src: '<%= project.src %>/css',
				app: '<%= project.app %>/css'
			},
			js: {
				src: '<%= project.src %>/js',
				app: '<%= project.app %>/js'
			}
		},
		
		/**
		 * Compress CSS files
		 * https://github.com/gruntjs/grunt-contrib-cssmin
		 */
		cssmin: {
			css: {
				src: '<%= project.css.src %>/main.css',
				dest: '<%= project.css.app %>/main.min.css'
			}
		},
		
		/**
		 * Uglify (minify) JavaScript files
		 * https://github.com/gruntjs/grunt-contrib-uglify
		 * Compresses and minifies the library JS files into one, and all the custom JS files into one
		 */
		uglify: {
			custom: {
				src: '<%= project.js.src %>/custom.js',
				dest: '<%= project.js.app %>/custom.min.js'
			}
		},
		
		// clean the build directory
		clean: {
			build: {
				src: [ '<%= project.app %>' ]
			},
		},
		
		// copy from the source directory to build
		copy: {
			build: {
				cwd: '<%= project.src %>/',
				src: ['**/*','!css/main.css','!js/custom.js','!SQL/**'],
				dest: '<%= project.app %>',
				expand: true
			}
		},
		
		watch: {
			css: {
				files: ['<%= project.css.src %>/main.css'],
				tasks: ['cssmin']
			},
			js: {
				files: ['<%= project.js.src %>/custom.js'],
				tasks: ['uglify']
			}
		}
	});

	// Load the required plugins.
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	
	// Default task(s).
	grunt.registerTask('default', ['cssmin','uglify','watch']);
	grunt.registerTask('build', ['clean','copy','cssmin','uglify']);
};