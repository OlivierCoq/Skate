/*Hello 24 Data Team! Olivier here. Here's my gruntfile that controls my file minifying process:*/

module.exports = function(grunt) {
    
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        //Minifying JavaScript files here:
    uglify: {
      build: {
        src: 'dist/JS/24data-valid.js',
        dest: 'dist/JS/24data-valid.min.js'
        
      }
    },
        //Minifying Images here:
    imagemin: {
        static: {
            options: {
                optimizationLevel: 5,//I choose this level for minifying images to avoid losing too much image quality
                svgoPlugins: [{removeViewBox: false}],
            },
            files: {
                'dist/IMG/FrontEndSkillsTestIconCompress.jpg': 'dist/IMG/FrontEndSkillsTestIcon.png',
            }
        },
        dynamic: {
            files: [{
                expand: true,
                cwd: 'src/',
                src: ['**/*.{png,jpg,gif}'],
                dest: 'dist/'
            }]
        }
    },    
      //Minifying CSS files here:
    cssmin : {
        target : {
            src : ["dist/CSS/style.css"],
            dest : "dist/CSS/style.min.css"
        }
    },
        
    htmlmin: {                                     
    dist: {                                      
      options: {                                 
        removeComments: true,
        collapseWhitespace: true
      },
      files: {                                   
        'index.php': 'dist/index.php',    
        'header.php': 'dist/header.php'
      }
    },
  }    
  });

    
//Registering and loading Grunt Plugins: 
    
  // loading uglify
  grunt.loadNpmTasks('grunt-contrib-uglify');
  // Default task(.
  grunt.registerTask('default', ['uglify']);
    //loading Image minify
  grunt.loadNpmTasks('grunt-contrib-imagemin');
    //Default
  grunt.registerTask('default', ['imagemin']);   
    //Load CSS minifier
  grunt.loadNpmTasks('grunt-contrib-cssmin');    
    //Default
  grunt.registerTask("default", ["cssmin"]);    
    //loading HTML minifier
  grunt.loadNpmTasks('grunt-contrib-htmlmin');
    //Default
  grunt.registerTask("default", ["htmlmin"]); 
};    
        