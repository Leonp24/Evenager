Evenager - Website Event Manager (Laravel 12)

Nama: Leonando Prastiko
NIM : 20230200142
Mata Kuliah : Sistem Informasi
Tanggal: 28 Juni 2025

==================================================
✨ FITUR YANG TERSEDIA:
==================================================
1. Halaman utama dengan daftar 3 event terbaru
2. Halaman semua event
3. Detail event
4. Form registrasi user untuk ikut event
5. Login untuk admin
6. Admin dashboard untuk kelola event (CRUD)
7. Admin bisa melihat siapa saja yang sudah mendaftar event
8. Validasi form dan notifikasi (SweetAlert)
9. Gambar event tersimpan di public/images

==================================================
👨‍💻 CARA INSTALL & JALANKAN:
==================================================
1. Extract folder `evenager-project.zip`
2. Jalankan terminal / cmd ke direktori project
3. Jalankan perintah berikut:

    composer install  
    npm install && npm run dev  
    cp .env.example .env  
    php artisan key:generate 

(Namun bisa diskip karena yang saya jadikan zip full dengan beberapa dependencies tersebut, kecuali pull/clone dari link github)

4. Buat database baru di phpMyAdmin: `event_manager`
5. Import file `database/database.sql`
6. Jalankan migration jika perlu:

    php artisan migrate  

7. Jalankan server lokal:

    php artisan serve  

8. Buka di browser: http://127.0.0.1:8000

==================================================
🔐 LOGIN ADMIN
==================================================
Url : admin/login Email: admin@example.com  
Password: password123

==================================================
📂 CATATAN
==================================================
- Gambar disimpan di folder /public/images
- File `database.sql` sudah termasuk data sample
