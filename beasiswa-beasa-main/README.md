# Aplikasi Informasi Besiswa (Beasa)

## Beasa
Aplikasi ini memberikan informasi tentang beasiswa yang ada di indonesia maupun di luar negri agar mahasiswa lebih mudah menemukan informasi tentang beasiswa, aplikasi ini juga menyediakan formulir pendaftaran beasiswa agar mahasiwa dapat lebih mudah untuk mendaftar beasiswa.		

## Installation :

1. composer install
2. cp .env.example .env
3. make database "beasa" on local
4. change "laravel" to "beasa" on .env (DB_DATABASE)
5. php artisan key:generate
6. php artisan migrate
7. php artisan db:seed
8. php artisan storage:link
9. php artisan serve  

Notes : make sure XAMPP -> Apache & MySQL Active before step 4.
