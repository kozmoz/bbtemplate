module.exports = function(grunt) {

    var javascripts = [
        "Lokaal-Hellendoorn/js/vendor/jquery-1.12.0.js",
        "Lokaal-Hellendoorn/js/vendor/bootstrap-3.3.6.js",
        "Lokaal-Hellendoorn/js/vendor/owl.carousel.min.js",
        "Lokaal-Hellendoorn/js/vendor/form-validation.js",
        "Lokaal-Hellendoorn/js/app/contact.js",
        "Lokaal-Hellendoorn/js/app/main.js"
    ];

    // Project configuration
    grunt.initConfig({
        // Metadata.
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            files: [
                'Lokaal-Hellendoorn/js/app/*.js',
                'Lokaal-Hellendoorn/js/vendor/*.js',
                'Lokaal-Hellendoorn/sass/*.scss',
                'Lokaal-Hellendoorn/sass/app/partials/*.scss',
                'Lokaal-Hellendoorn/sass/app/pages/*.scss',
                'Lokaal-Hellendoorn/sass/app/*.scss',
                'Lokaal-Hellendoorn/sass/vendor/bootstrap/_variables.scss'],
            tasks: ['sass:dist', 'uglify:main']
        },
        sass: {
            dist: {
                options: {
                    style: "expanded"
                },
                files: {
                    'Lokaal-Hellendoorn/css/screen.min.css': 'Lokaal-Hellendoorn/sass/screen.scss'
                },
                compass: false
            }
        },
        uglify: {
            main: {
                options: {
                    compress: false
                },
                files: {
                    'Lokaal-Hellendoorn/js/min/app.min.js': javascripts
                }
            }
        }
    });

    // These plugins provide necessary tasks.
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Default task.
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build', ['sass:dist', 'uglify:main']);
};
