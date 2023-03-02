# SIMASJID
aplikasi webbased utk pengelolaan masjid / yayasan
(tampilan responsif sehingga tetap bisa diakses lewat layar HP utk entry data-data)

**SPESIFIKASI MINIMAL :**
- PHP 7.2
- MySQL / PostgreSQL / MariaDB
- Apache 2.0
- NodeJS v.14 (khusus WA Blast)

**FITUR-FITUR :**
1. Data Nama, Alamat, No.Rekening Masjid/Yayasan
2. Data Pengurus Masjid/Yayasan
3. Data Jamaah Masjid
4. Format & Template Surat Keluar
5. Setup WhatsApp Blast utk kirim pesan secara massal
6. Upload & Akses Dokumen Masjid/Yayasan
7. Pembuatan Surat Keluar dgn format PDF
8. Pembuatan Notulen Rapat
9. Data Ustadz/Khotib
10. Jadwal Khotib Jumat
11. Jadwal Imam Sholat
12. Jadwal Kajian Ahad Shubuh
13. Pengiriman Pesan via WhatsApp sesuai target
14. Pencatatan Keluar/Masuk Dana Masjid/Yayasan
15. Laporan Keuangan Masjid/Yayasan
16. Jadwal Sholat 5 waktu di dashboard (setup Kota di no.1 diatas)
17. Setting Tampilan TV Masjid --> https://github.com/ifin2000/tv-masjid

**DEMO** (untuk mencoba fitur2nya) :  
https://softanesia.com/simasjid  
user : admin  
pass : 123456  
(mohon jangan ubah password agar yg lain bisa akses) 

Bila ingin diinstall di komputer/laptop lokal (offline), silahkan download di :   
https://softanesia.com/simasjid/dl/simasjid-v1.0.zip  
(didalamnya sudah include Laragon yg sudah terisi Apache, PHP, MySQL dan setupnya)  
tinggal ekstrak, klik 2x simasjid.exe, jalankan Apache & MySQL lewat menu Laragon, lalu buka browser, ketikkan 127.0.0.1/simasjid  

![dashboard](https://user-images.githubusercontent.com/7757976/219941741-71044684-57b6-47c9-865d-cb15d5f54354.png)

**CATATAN** :
- API utk jadwal sholat diambil dari https://api.myquran.com/
- Bila diinstal di komputer lokal, maka WA Blast dan Jadwal Sholat tidak akan berfungsi (karena harus online)
- Untuk WA Blast, karena menggunakan nodejs ada hal yg perlu diperhatikan,
1. folder di nodejs-wa-blast, sengaja diletakkan di dalam folder www agar bila pakai server hosting tetap bisa diakses
2. perlu install modul-modul nodejs sesuai yg ada di package.json
3. isikan IP address server di tabel setup_wablast agar dikenali oleh aplikasi (misal : http://12.34.56.78:8081)

sumber info penggunaan WhatsApp blast dgn nodejs bisa dipelajari di https://www.youtube.com/watch?v=xF0Z6Te2yO8
