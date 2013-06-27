
module.exports = (grunt) ->

  grunt.initConfig
    pkg: grunt.file.readJSON 'package.json'
    less:
      compile:
        files:
          'affable/css/all.css': 'affable/css/style.less'
    coffee:
      options:
        bare: true
      compile:
        files:
          'affable/js/affable.js': ['affable/js/*.coffee']
    concat:
      options:
        separator: ';'
      all:
        src: ['library/js/scripts.js', 'affable/js/affable.js']
        dest: 'affable/js/all.js'
    watch:
      less:
        files: ['affable/css/*.less']
        tasks: ['less', 'reload']
      coffee:
        files: ['affable/js/*.coffee']
        tasks: ['coffee', 'concat', 'reload']
      all:
        files: ['*']
        tasks: ['reload']

  grunt.loadNpmTasks 'grunt-contrib-less'
  grunt.loadNpmTasks 'grunt-contrib-watch'
  grunt.loadNpmTasks 'grunt-contrib-concat'
  grunt.loadNpmTasks 'grunt-contrib-coffee'

  # https://coderwall.com/p/keuhda
  grunt.registerTask "reload", "reload Chrome on OS X", ->
    require("child_process").exec "osascript " +
      "-e 'tell application \"Google Chrome Canary\" " +
      "to tell the active tab of its first window' " +
      "-e 'reload' " +
      "-e 'end tell'"

  grunt.registerTask 'default', ['less', 'coffee', 'concat']
  grunt.registerTask 'dev', ['default', 'watch']

