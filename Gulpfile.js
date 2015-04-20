var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('css', function() {
    gulp.src('app/assets/sass/main.scss')
        .pipe(sass())
        .pipe(gulp.dest('public/css'));

});

gulp.task('watch', function(){
    //anytime anything in the sass dir or with an ext of scss
    //is created/editd it will run the 'css' task
   gulp.watch('app/assets/sass/**/*.scss', ['css']);
});

gulp.task('default', ['watch']);