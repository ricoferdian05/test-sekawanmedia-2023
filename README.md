# Test Sekawan Media

## Daftar Akun

Admin
email : admin@gmail.com \n
password : admin

Agreement 1
email : agreement1@gmail.com
password : agreement1

Agreement 2
email: agreement2@gmail.com
password : agreement2

## Database Version
MySQL Database : 10.4.27-MariaDB

## PHP Version
PHP 8.1.12

## Framework
Codeigniter 4

## Panduan Penggunaan Aplikasi
- Tambahkan database baru di MySQL Database dengan nama `test-sekawanmedia-2023`
- Clone Github ini dengan command `git clone https://github.com/ricoferdian05/test-sekawanmedia-2023.git`
- Buka terminal / cmd pada folder yang baru saja di clone
- Mengupdate Composer `compser update`
- Set up ENV -> copy `env` dan ubah nama file copy menjadi `.env`. Lalu setup file `.env` seperti gambar berikut ![image](https://github.com/ricoferdian05/test-sekawanmedia-2023/assets/71257965/318b8a1d-83b7-4aec-84b1-a110bf6739d1)\
- Migration dan Seeding Database -> Migrasi terlebih dahulu database yang sudah saya buat dengan mengetikkan `php spark migrate` pada terminal. Lalu Seeding satu persatu dengan command `php spark db:seed NamaFile`. File Seeding bisa di cek di folder `app/Database/Seeds`, contoh `php spark db:seed Driver`.
- Set up Aplikasi sudah selesai

## Run Aplikasi
- Buka terminal pada folder project.
- Ketikkan `php spark serve` pada terminal.
- ![image](https://github.com/ricoferdian05/test-sekawanmedia-2023/assets/71257965/d9887b0f-940c-4806-9c22-b941982d9faf) akan muncul tampilan seperti gambar diatas lalu buka di browser server tersebut. `http://localhost:8080` pada browser, lalu anda akan di alihkan ke halaman login
- Masukkan email dan password yang sudah saya sediaka diatas.

## Fungsi Aktor
Admin =
1. Mempunyai dashboard yang berisi grafik riwayat pemakaian kendaraan.
2. Dapat menambahkan form pemesanan kendaraan yang nantinya akan disetujui / ditolak oleh aktor `agreement1` dan `agreement2`.
3. Dapat melihat data kendaraan yang ada
4. Dapat melihat data driver yang ada
5. Dapat melihat semua riwayat transaksi / pemesanan yang ada. Dan mencetak nya dengan menekan button `cetak` di pojok kanan atas.

Agreement 1 =
1. Mempunyai dashboard yang berisi grafik riwayat pemakaian kendaraan dan tabel riwayat semua pemesanan.
2. Dapat menyetujui pemesanan yang dikirimkan oleh admin yang nantinya status pemesanan akan di update menjadi `Disetujui level 1`

Agreement 2 =
1. Mempunyai dashboard yang berisi grafik riwayat pemakaian kendaraan dan tabel riwayat semua pemesanan.
2. Dapat menyetujui pemesanan yang dikirimkan oleh admin, namun harus menunggu persetujuan dari `Agreement 1` yang nantinya status pemesanan akan di update menjadi `Selesai`
3. Jika belum disetujui oleh `Agreement 1`, data pemesanan tidak akan muncul pada halaman transaksi.

# Cukup Sekian untuk Aplikasi Pemesanan Kendaraan
