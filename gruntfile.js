module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		
		// Project info.
		project: {
			src: 'src',
			css: '<%= project.src %>/css'
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
		}
	});

  // Load the required plugins.
  grunt.loadNpmTasks('grunt-contrib-cssmin');

  // Default task(s).
  grunt.registerTask('default', ['cssmin']);

};