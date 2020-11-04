## instalasi (clone) proyek ppl

1.  copy https://github.com/dinggasukapaus/management_keuangan.git
2.  "composer update" di terminal
3.  buat databse sesuai nama database , setting di file ".env"
4.  ketik composer require laravel/ui="1.\*" --dev
5.  ketik php artisan ui --auth bootstrap
6.  ketik npm install
7.  ketik npm run dev
8.  php artisan migrate
9.  php artisan key:generate
10. php artisan db:seed
11. php artisan serve

## Todo

-   [x] instalasi template
-   [x] login
-   [ ] role user
-   [ ] dashboard
-   [ ] management keuangan
-   [ ] management distributor
-   [ ] management pegawai
-   [ ] management jadwal pertemuan && management produksi
-   [ ] data rekap
