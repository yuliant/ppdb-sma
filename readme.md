# PPDB SMA

PPDB SMA Merupakan sebuah aplikasi berbasis web framework codeigniter yang dikembangkan oleh Masrizal Eka Yulianto untuk penerimaan peserta didik baru di SMA PGRI 1 SIDOARJO. Aplikasi ini adalah aplikasi untuk memanajemen proses PPDB di SMA tersebut.

Catatan : anda dapat melihat catatan pembaruan repository [disini](https://github.com/yuliant/ppdb-sma/blob/master/documentation/update-note.rst).

### Cara Install
1. Silahkan clone atau download repository ini.
2. Import database yang berada di `.\application\databases\ppdb-sma.sql` ke MySQL Database anda.
3. Lakukan konfigurasi pada `.\application\config\config.php` untuk mengatur `$config['base_url']` dan `.\application\config\database.php` untuk mengatur database.
4. Tambahkan file .htaccess untuk bypass index.php .
5. Periksa ceklogin_helper.php pada folder helper `.\application\helpers\` untuk menyesuaikan role pengguna.
6. Done, silahkan jalankan website.