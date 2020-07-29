# laravote
Online Voting Website with Laravel

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost you and your team's skills by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

![01 Halaman Login](https://github.com/RifkiCS29/laravote/blob/master/public/img/login.png)
![01 Halaman Home Summary](https://github.com/RifkiCS29/laravote/blob/master/public/img/home.png)
![01 Halaman Manage Users](https://github.com/RifkiCS29/laravote/blob/master/public/img/manageUser.png)
![01 Halaman Manage Candidates](https://github.com/RifkiCS29/laravote/blob/master/public/img/manageCandidates.png)
![01 Halaman Choice](https://github.com/RifkiCS29/laravote/blob/master/public/img/choice.png)

## How To Install this Project

- Persiapan
1. Memiliki CLI/Command Line Interface berupa Command Prompt (CMD) atau Power Shell atau Git Bash (selanjutnya kita sebut terminal).
2. Memiliki Web Server (misal XAMPP) dengan PHP minimal versi 7.1.3.
3. Composer telah ter-install, cek dengan perintah composer -V melalui terminal.
4. Memiliki koneksi internet (untuk proses installasi).

Langkah-Langkah
1. Download Source Code dari repo Github laravote dalam bentuk Zip.
2. Extract file zip (source code) ke dalam direktori htdocs pada XAMPP, misal htdocs/laravote.
3. Melalui terminal, cd ke direktori laravote.
4. (Sesuai petunjuk installasi) Pada terminal, berikan perintah <b>composer install</b>. Ini yang perlu koneksi internet.
5. Composer akan menginstall dependency paket dari source code tersebut hingga selesai.
6. Jalankan perintah php artisan, untuk menguji apakah perintah artisan Laravel bekerja.
7. Buat database baru (kosong) pada mysql (via phpmyadmin) dengan nama <b>laravote</b>.
8. Duplikat file .env.example, lalu rename menjadi .env.
9. Kembali ke terminal, php artisan key:generate.
10. Setting koneksi database di file .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD).
    <br>DB_CONNECTION=mysql
    <br>DB_HOST=localhost
    <br>DB_PORT=3306
    <br>DB_DATABASE=laravote
    <br>DB_USERNAME=root
    <br>DB_PASSWORD=
11. Lalu Tambahkan Kode Berikut di .env
    <br>GOOGLE_CLIENT_ID=********************
    <br>GOOGLE_CLIENT_SECRET=********************
    <br>GOOGLE_REDIRECT_CALLBACK=http://localhost:8000/google/callback
    
    GOOGLE_CLIENT_ID dan GOOGLE_CLIENT_SECRET bisa didapatkan dengan mengikuti tutorial berikut https://daengweb.id/google-authentication-with-laravel-58
11. Jika hanya ingin membuat tabel, jalankan perintah <b>php artisan migrate</b>. Cek di phpmyadmin, seharusnya tabel sudah muncul.
12. Jalankan perintah <b>php artisan db:seed</b> untuk mengisi tabel users yang digunakan untuk proses login
    <br>EMAIL = rifki@admin.com
    <br>PASSWORD = admin
13. Setelah selesai, Jalankan perintah <b>php artisan serve</b> maka dapat diakses dengan http://localhost:8000/

SEKIAN PENJELASAN DARI SAYA, TERIMAKASIH. Created by <b>RIFKI</b>



