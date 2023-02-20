# SIMASJID
aplikasi webbased utk pengelolaan masjid / yayasan
(tampilan responsif sehingga tetap bisa diakses lewat layar HP utk entry data-data)

Fitur-fitur :
1. Data Nama & Alamat Masjid/Yayasan
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

![dashboard](https://user-images.githubusercontent.com/7757976/219941741-71044684-57b6-47c9-865d-cb15d5f54354.png)

CATATAN :
khusus utk setup WA Blast, karena menggunakan nodejs ada hal yg perlu diperhatikan,
1. folder di nodejs-wa-blast, sengaja diletakkan di dalam folder www agar bila pakai server hosting tetap bisa diakses
2. perlu install modul-modul nodejs sesuai yg ada di package.json
3. isikan IP address server di tabel setup_wablast agar dikenali oleh aplikasi (misal : http://12.34.56.78:8081)

sumber info penggunaan WhatsApp blast dgn nodejs bisa dipelajari di https://www.youtube.com/watch?v=xF0Z6Te2yO8
