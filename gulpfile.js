var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('sass', function(){
    return gulp.src('resources/sass/*.scss')
        .pipe(sass()) // Конвертируем Sass в CSS с помощью gulp-sass
        .pipe(gulp.dest('public/css'))
});

gulp.task('sassNews', function(){
    return gulp.src('resources/sass/news/*.scss')
        .pipe(sass()) // Конвертируем Sass в CSS с помощью gulp-sass
        .pipe(gulp.dest('public/css/news'))
});

gulp.task('watch', function(done) {
    gulp.watch('resources/sass/*.scss', gulp.series('sass'));
    gulp.watch('resources/sass/news/*.scss', gulp.series('sassNews'));
    done();
});
