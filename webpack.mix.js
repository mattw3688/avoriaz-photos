let mix = require('laravel-mix');
//Set as site domain
const domain = 'thesiteurl.com';
const homedir = require('os').homedir();
mix
    .js('src/js/app.js', 'js')
    .sass('src/scss/app.scss', 'css')
    .setPublicPath('dist')
    .copyDirectory('src/fonts', 'dist/fonts')
    .copyDirectory('src/icons', 'dist/icons')
    .options({
        processCssUrls: false
    })
    .browserSync({
        proxy: 'https://' + domain,
        host: domain,
        open: 'external',
        https: {
            key: homedir + "/.config/valet/Certificates/" + domain + ".key",
            cert: homedir + "/.config/valet/Certificates/" + domain + ".crt"
        },

})
;

