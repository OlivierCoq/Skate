module.exports = function(grunt) {

  // Sass prereqs:
    //npm install --save-dev node-sass
const sass = require('node-sass');

    
  // Configuration for entire project
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat: {

        dist: {
        src: [
          'library/js/libs/jquery-3.3.1.min.js',
          'library/js/libs/*.js',
          'library/js/*.js'
        ],
        dest: 'dist/js/production.js'
      }
    },
    uglify: {
      dist: {
        src: 'dist/js/production.js',
        dest: 'dist/js/production.min.js'
      }
    },
    imagemin: {
        pictures: {
          options: {
                optimizationLevel: 7,
                svgoPlugins: [{removeViewBox: false}],
            },     
          files: [{
            expand: true, // Enable dynamic expansion
            cwd: 'library/img/', // source images (not compressed)
            src: ["*.{png,jpg,gif}"], // Actual patterns to match
            dest: 'dist/img/' // Destination of compressed files
          }]
        },
        logo: {
          options: {
                optimizationLevel: 5,
                svgoPlugins: [{removeViewBox: false}],
            },        
          files: [{
            expand: true, // Enable dynamic expansion
            cwd: 'library/img/logo', // source images (not compressed)
            src: ["**/*.{png,jpg,gif}"], // Actual patterns to match
            dest: 'dist/img/logo' // Destination of compressed files
          }]
        },
    }, //end imagemin
    sass: {
		options: {
            implementation: sass,
			sourceMap: true
		},
		dist: {
			files: {
				'dist/css/production.css': 'library/sass/global.scss'
			},
		},
	},  
    cssmin: {
      add_banner: {
        options: {
          banner: '/* Minified CSS File*/'
        },
        files: {
          "dist/css/production.min.css": "dist/css/production.css"
        }
      }
    },

    compress: {
      client: {
        options: {
          archive: 'Skate.zip', //Y(if using as a theme file for a CMS. Good to have even if you aren't, for FTP reasons)
          mode: 'zip'
        },
        files: [{
          expand: true,
          src: [
            '**',
            '!node_modules/**',
            '!_docs/**',
            '!library/**',
            '!*.zip',
          ],
          dest: '/Skate'
        }]
      }
    },

    watch: {
      options: {
        livereload: true
      },
      src: {
        files: ['*.php', 'includes/**/*.php'],
        tasks: ['compress']
      },
      scripts: {
        files: ['library/js/*.js'],
        tasks: ['concat', 'uglify', 'compress'],
        options: {
          spawn: false
        }
      },
      css: {
        files: ['*.css','library/sass/*.scss','library/sass/**/*.scss'],
        tasks: ['sass', 'cssmin', 'compress'],
        options: {
          spawn: false,
          debounceDelay: 250
        }
      },
      images: {
        files: ['library/img/*.{png,jpg,gif}'],
        tasks: ['imagemin', 'compress']
      },
      /* watch images added to src */
    }
  });

  // 3. Tell Grunt which plugins to use 
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-compress');

  // Default command line tool for the project
  grunt.registerTask('default', ['watch']);

};
