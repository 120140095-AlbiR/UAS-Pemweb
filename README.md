# Penjelasan Kode
## Bagian 1: Client-side Programming
### 1.1 Manipulasi DOM dengan JavaScript
- **Buat form input dengan minimal 4 elemen input (teks, checkbox, radio, dll.)**
Form input dengan minimal 4 input terdapat pada process_book.php dengan 5 parameter berupa title, author, genre, published, dan available.

- **Tampilkan data dari server ke dalam sebuah tabel HTML.**
Data ditampilkan dalam tabel pada process_book.php

### 1.2 Event Handling
- **Tambahkan minimal 3 event yang berbeda untuk meng-handle form pada 1.1.**

- **Implementasikan JavaScript untuk validasi setiap input sebelum diproses oleh PHP.**


## Bagian 2: Server-side Programming
### 2.1 Pengelolaan Data dengan PHP
- **Gunakan metode POST atau GET pada formulir.**
Metode POST digunakan pada proses memasukkan buku di process_book.php. Sementara metode GET digunakan pada proses login dan sign up di login.php dan signup.php.

- **Parsing data dari variabel global dan lakukan validasi di sisi server.**

- **Simpan ke basis data termasuk jenis browser dan alamat IP pengguna.**

### 2.2 Objek PHP Berbasis OOP
- **Buat sebuah objek PHP berbasis OOP yang memiliki minimal dua metode dan gunakan objek tersebut dalam skenario tertentu.**

## Bagian 3: Database Management
### 3.1 Pembuatan Tabel Database
Pembuatan tabel database dilakukan dengan command pada library_management.sql
### 3.2 Konfigurasi Koneksi Database

### 3.3 Manipulasi Data pada Database

## Bagian 4: State Management
### 4.1 State Management dengan Session
- **Gunakan session_start() untuk memulai session.**
Penggunaan session_start() terdapat pada login.php dan process_book.php

- **Simpan informasi pengguna ke dalam session.**


### 4.2 Pengelolaan State dengan Cookie dan Browser Storage
- **Buat fungsi untuk menetapkan, mendapatkan, dan menghapus cookie.**

- **Gunakan browser storage untuk menyimpan informasi secara lokal.**

