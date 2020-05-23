# PPDB SMA

PPDB SMA Merupakan sebuah aplikasi berbasis web framework codeigniter yang dikembangkan oleh [Masrizal Eka Yulianto](https://www.linkedin.com/in/masrizaleka/) dan Ade Setya Prambudi untuk penerimaan peserta didik baru di SMA PGRI 1 SIDOARJO. Aplikasi ini adalah aplikasi untuk memanajemen proses PPDB di SMA tersebut.

Catatan : anda dapat melihat catatan pembaruan repository [disini](https://github.com/yuliant/ppdb-sma/blob/master/documentation/update-note.rst).

### Cara Install
1. Silahkan clone atau download repository ini.
2. Import database yang berada di `.\application\databases\ppdb_sma.sql` ke MySQL Database anda.
3. Lakukan konfigurasi pada `.\application\config\database.php` untuk mengatur database.
4. (opsional)Check apakah file .htaccess sudah ada atau tidak. Jika tidak ada,Tambahkan file .htaccess untuk bypass index.php .
5. Done, silahkan jalankan website.

### Fitur - Fitur
### User
1. Mendaftar sebagai user.
2. Login sebagai user.
3. Melihat panduan, info daftar ulang, agenda, dan hubungi admin. 
4. Mendaftar untuk mendapatkan formulir.
5. Mengisi dan mengedit formulir yang terdiri atas data pribadi, data orang tua, dan kelengkapan lainnya.
6. Mencetak formulir.
7. Mendapatkan barcode profile pribadi.

### Admin
1. Login sebagai admin.
2. Read, Delete, dan change status data user.
3. Read, dan konfirmasi bukti pendaftar.
4. Read, dan download formulir dari pendaftar.
5. Melihat dan memanagement pembayaran, agenda, dan kontak admin.
6. Memanagement profile.
6. Menscan/mengecek formulir pendaftar