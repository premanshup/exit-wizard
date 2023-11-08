module.exports = function (grunt) {
  grunt.initConfig({
    cssmin: {
      build: {
        src: "assets/css/main.css",
        dest: "assets/css/main.min.css",
      },
    },

    terser: {
      "assets/js/main.min.js": ["assets/js/main.js"],
    },

    makepot: {
      target: {
        options: {
          domainPath: "/languages",
          mainFile: "exit-wizard.php",
          potFilename: "exit-wizard.pot",
          potHeaders: {
            poedit: true,
            "x-poedit-keywordslist": true,
          },
          type: "wp-plugin",
          updateTimestamp: true,
        },
      },
    },
  });

  // Minify task
  grunt.registerTask("minify", ["cssmin", "terser"]);
  // Generate POT file.
  grunt.loadNpmTasks("grunt-wp-i18n");

  // Load up tasks
  grunt.loadNpmTasks("grunt-terser");
  grunt.loadNpmTasks("grunt-contrib-cssmin");
};
