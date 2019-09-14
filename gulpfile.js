var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('sass', function(){
    return gulp.src('resources/sass/*.scss')
        .pipe(sass()) // Конвертируем Sass в CSS с помощью gulp-sass
        .pipe(gulp.dest('public/css'))
});


gulp.task('watch', function(done) {
    gulp.watch('resources/sass/app.scss', gulp.series('sass'));
    done();
});
