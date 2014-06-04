var grunt = require('grunt');

module.exports = function() {

  var task_packages = [
    'grunt-contrib-sass',
    'grunt-contrib-watch',
    'grunt-contrib-coffee',
    'grunt-contrib-concat',
    'grunt-contrib-clean'
  ];

  for(var i = 0; i < task_packages.length; i++) {
    grunt.loadNpmTasks(task_packages[i]);
  }

  grunt.initConfig({
    clean: {
      obj: ['assets/obj'],
      dist: ['public/js', 'public/css']
    },
    sass: {
      build: {
        options: {
          loadPath: require('node-neat').includePaths
        },
        files: {
          'public/css/application.css': 'assets/sass/app.sass'
        }
      }
    },
    coffee: {
      src: {
        options: {
          bare: true,
          join: true
        },
        files: {
          'assets/obj/js/app.js': ['assets/coffee/module.coffee', 'assets/coffee/**/*.coffee']
        }
      }
    },
    concat: {
      dist: {
        src: ['bower_components/angular/angular.js', 'assets/obj/js/app.js'],
        dest: 'public/js/application.js',
      },
    },
    watch: {
    }
  });

  grunt.registerTask('default', ['clean','coffee','concat','sass']);

}
