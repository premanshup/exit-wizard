module.exports = function (grunt) {
  var pkgInfo = grunt.file.readJSON("package.json");

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

    clean: {
      main: ["exit-wizard"],
      zip: ["*.zip"],
    },

    copy: {
      main: {
        options: {
          mode: true,
        },
        src: [
          "**",
          "!node_modules/**",
          "!.git/**",
          "!.github/**",
          "!bin/**",
          "!Gruntfile.js",
          "!package.json",
          "!.gitignore",
          "!README.md",
          "!vendor/**",
          "!composer.json",
          "!composer.lock",
          "!package-lock.json",
          "!phpcs.xml.dist",
        ],
        dest: "exit-wizard/",
      },
    },

    compress: {
      main: {
        options: {
          archive: "exit-wizard" + pkgInfo.version + ".zip",
          mode: "zip",
        },
        files: [
          {
            src: ["./exit-wizard/**"],
          },
        ],
      },
    },
  });

  // Minify task
  grunt.registerTask("minify", ["cssmin", "terser"]);
  // Generate POT file.
  grunt.loadNpmTasks("grunt-wp-i18n");
  // Grunt release - Create installable package of the local files
  grunt.loadNpmTasks("grunt-contrib-copy");
  grunt.loadNpmTasks("grunt-contrib-compress");
  grunt.loadNpmTasks("grunt-contrib-clean");
  grunt.registerTask("release", [
    "clean:zip",
    "copy:main",
    "compress:main",
    "clean:main",
  ]);
  // Load up tasks
  grunt.loadNpmTasks("grunt-terser");
  grunt.loadNpmTasks("grunt-contrib-cssmin");
};
