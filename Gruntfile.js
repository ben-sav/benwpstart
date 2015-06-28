//Gruntfile

module.exports = function (grunt) {

	var _path = "wp-content/themes/benwp/";

	var lessMainFile = _path + 'style.less',
		lessFiles = _path + 'css/less/**/*.less',
		bootstrapMainFile = 'bower_components/bootstrap/less/bootstrap.less',
		bootstrapFiles = 'bower_components/bootstrap/less/**/*.less',
		jquery = 'bower_components/jquery/dist/jquery.js',
		jsFiles = _path + 'js/dev/**/*.js',
		jsDest = _path + 'js/main.js',
		html5 = 'bower_components/html5-boilerplate/dist/';


	//Initializing the configuration object

	grunt.initConfig({

		copy: {
			start: {
				files: [
					{
						expand: true,
						cwd: html5,
						src: ['**'],
						dest: _path,
						filter: 'isFile'
					}
				]
			}
		},

		less: {
			prod: {
				options: {
					compress: true
				},
				files: {
					'wp-content/themes/benwp/style.css': lessMainFile,
					'wp-content/themes/benwp/css/bootstrap.css': bootstrapMainFile
				}
			},
			dev: {
				options: {
					compress: false
				},
				files: {
					'wp-content/themes/benwp/style.css': lessMainFile
				}
			},
			bootstrap: {
				options: {
					compress: false
				},
				files: {
					'wp-content/themes/benwp/css/bootstrap.css': bootstrapMainFile
				}
			}
		},

		concat: {
			options: {
				separator: ';'
			},
			all: {
				src: [
					jquery,
					jsFiles
				],
				dest: jsDest
			}
		},

		uglify: {
			options: {
				mangle: true  // false if you want the names of your functions and variables unchanged
			},
			prod: {
				files: {
					'wp-content/themes/benwp/js/main.js': 'wp-content/themes/benwp/js/main.js'
				}
			}
		},

		autoprefixer: {
			options: {
				browsers: ['> 1%', 'last 2 versions', 'ie 7', 'ie 8', 'ie 9']
			},
			dist: {
				files: [{
					expand: true,
					src: 'wp-content/themes/benwp/style.css'
				}]
			}
		},

		watch: {
			js: {
				options: {
					livereload: true
				},
				files: [
					jsFiles
				],
				tasks: [
					'concat:all'
				]
			},
			less: {
				options: {
					livereload: true
				},
				files: [
					lessFiles
				],
				tasks: [
					'less:dev',
					'autoprefixer'
				]
			},
			lessBootstrap: {
				options: {
					livereload: true
				},
				files: [
					bootstrapFiles
				],
				tasks: [
					'less:bootstrap'
				]
			}
		},

		makepot: {
			target: {
				options: {
					cwd: "wp-content/themes/benwp/",
					include: [
						'.*' // as a regex
					],
					type: 'wp-theme', // or `wp-plugin`
					domainPath: "/languages"
				}
			}
		}
	});

// Plugin loading
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-wp-i18n');
	grunt.loadNpmTasks('grunt-autoprefixer');

// Task definition
	grunt.registerTask('start', [
		'copy:start',
		'less:dev',
		'less:bootstrap',
		'concat:all'
	]);
	grunt.registerTask('default', [
		'less:dev',
		'less:bootstrap',
		'autoprefixer',
		'concat:all',
		'watch'
	]);
	grunt.registerTask('prod', [
		'less:prod',
		'autoprefixer',
		'concat:all',
		'uglify:prod',
	]);
	grunt.registerTask('trad', [
		'makepot',
	]);

};