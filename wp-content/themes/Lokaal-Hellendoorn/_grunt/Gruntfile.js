module.exports = function(grunt) {

    var javascripts = [
        "../js/vendor/jquery-1.12.0.js",
        "../js/vendor/bootstrap-3.3.6.js",
        "../js/vendor/owl.carousel.min.js",
        "../js/vendor/form-validation.js",
        "../js/app/contact.js",
        "../js/app/main.js"
    ];

    // Project configuration
    grunt.initConfig({
        // Metadata.
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            files: ['../js/app/*.js', '../js/vendor/*.js', '../sass/*.scss', '../sass/app/partials/*.scss', '../sass/app/pages/*.scss',  '../sass/vendor/bootstrap/_variables.scss'],
            tasks: ['sass:dist', 'uglify:main']
        },
        sass: {
            dist: {
                options: {
                    style: "expanded"
                },
                files: {
                    '../css/screen.min.css': '../sass/screen.scss'
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
                    '../js/min/app.min.js': javascripts
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

};
