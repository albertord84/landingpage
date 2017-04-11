var _ = require('lodash');

module.exports = function(grunt) {

  var config = {
    nmods: 'node_modules',
    wdir: 'web',
    concat: {
      angular: {
        src: [
          'node_modules/angular/angular.min.js',
          'node_modules/angular-cookies/angular-cookies.min.js',
          'node_modules/angular-resource/angular-resource.min.js',
          'node_modules/countup.js/dist/countUp.min.js',
          'node_modules/countup.js/dist/angular-countUp.min.js'
        ],
        dest: 'web/js/angular.js'
      }
    }
  };
  
  grunt.initConfig(config);

  grunt.loadNpmTasks('grunt-contrib-concat');

  grunt.registerTask('copy-jquery', function(){
    var _c = grunt.file.copy;
    _c(config.nmods + '/jquery/dist/jquery.min.js', 
      config.wdir + '/js/jquery.min.js');
  });

  grunt.registerTask('copy-swal', function(){
    var _c = grunt.file.copy;
    _c(config.nmods + '/sweetalert/dist/sweetalert.min.js', 
      config.wdir + '/js/sweetalert.min.js');
    _c(config.nmods + '/sweetalert/dist/sweetalert.css', 
      config.wdir + '/css/sweetalert.css');
  });

  grunt.registerTask('copy-bs', function(){
    var _c = grunt.file.copy;
    grunt.task.run('copy-jquery');
    // fonts
    var fontsArray = [ 
      'glyphicons-halflings-regular.eot',
      'glyphicons-halflings-regular.ttf',
      'glyphicons-halflings-regular.woff2',
      'glyphicons-halflings-regular.svg',
      'glyphicons-halflings-regular.woff' 
    ];
    _.forEach(fontsArray, function(fontName, index, collection){
      _c(config.nmods + '/bootstrap/dist/fonts/' + fontName, 
        config.wdir + '/fonts/' + fontName);
    });
    // js
    _c(config.nmods + '/bootstrap/dist/js/bootstrap.min.js', 
      config.wdir + '/js/bootstrap.min.js');
    // css
    _c(config.nmods + '/bootstrap/dist/css/bootstrap.min.css', 
      config.wdir + '/css/bootstrap.min.css');
  });

};
