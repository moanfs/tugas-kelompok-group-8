## Tugas Minggu 4 Kelompok 8

Web ini menggunkan framework laravel 10, mysql sebegai database

-   [laravel](https://laravel.com/docs/routing)
-   [PHP V^8.1](https://www.php.net/)
-   [MySQL v5.7](https://dev.mysql.com/doc/refman/5.7/en/index.html)

## Installation

```
git clone https://github.com/moanfs/tugas-kelompok-group-8.git
```

## usege

1. install

```
composer install
```

2. setelah rename file dengan nama .evn.example menjasi .env
3. setelah itu generate key dengan copy dibawah

```
php artisan key:generate
```

4. lanjut dengan migrasi database dan seeder

```
php artisan migrate
```

```
php artisan db:seed databaseseeder
```

5. lanjut dengan menjalankan project dengan

```
php artisan serve
```

## Dokumentasi Tugas

1. Halaman Dashboard
   Menampilkan informasi barang, total margin, omset, modal, barang yang kurang laris berdasarkan penjualan kurang dari 10, barang laris dari yang terjaul terbanyak.
   ![Dashboard](https://github.com/moanfs/tugas-kelompok-group-8/blob/main/public/images/dashboard.png)
2. Tabel Pembelian
   Menampilkan data pembelian barang
   ![Tabel-Pembelian](https://github.com/moanfs/tugas-kelompok-group-8/blob/main/public/images/tabelpembelian.png)
3. Form Tambah Barang
   Form untuk menambahkan barang ke dalam tabel pembelian, tabel barang, dan tabel penjualan, pada form tambah barang telah dilengkapi dengan validasi harga penjualan harus lebih besar dari harga pembelian, dan semua input harus di isi
   ![Form-Pembelian](https://github.com/moanfs/tugas-kelompok-group-8/blob/main/public/images/form-pembelian.png)
4. Form Edit Barang
   Form untuk mengedit data barang
   ![Edit-Pembelian](https://github.com/moanfs/tugas-kelompok-group-8/blob/main/public/images/edit-pembelian.png)
5. Hapus Barang
   Fitur hapus data barang dari tabel barang yang berelasi ke tabel penjualan, dan tabel pembelian (onDelete cascade)
   ![Hapus-Pembelian](https://github.com/moanfs/tugas-kelompok-group-8/blob/main/public/images/hapus-pembelian.png)
6. Tabel Penjualan
   Menampilkan data penjualan
   ![Tabel-Penjualan](https://github.com/moanfs/tugas-kelompok-group-8/blob/main/public/images/penjualan.png)
7. Simulasi Pembelian
   Fitur simulasi pembelian yang akan menambah JumlahPenjualan pada tabel Penjualan, dan saat melakukan pembelian melebihi stok(jumlahPembelian-JumlahPenjualan) maka pembelian akan gagal, dan stok barang yang habis tidak ditampilkan lagi
   ![Simulasi](https://github.com/moanfs/tugas-kelompok-group-8/blob/main/public/images/simulasi.png)
8. Database
   Rancangan database yang digunakan
   ![Database](https://github.com/moanfs/tugas-kelompok-group-8/blob/main/public/images/database.png)
