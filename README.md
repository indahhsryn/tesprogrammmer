<!-- index.php -->

# Daftar Pengguna - Aplikasi Web : Indax.php

Aplikasi ini menampilkan daftar pengguna yang diambil dari API eksternal menggunakan `axios`.

## Fitur 
- Menampilkan data pengguna (nama, email, telepon, dll).
- Pesan loading saat data sedang diambil.
- Menampilkan pesan kesalahan jika gagal mengambil data.

## Teknologi
- **HTML** dan **CSS** (inline).
- **JavaScript** dengan **axios** untuk mengambil data dari API.

## Penjelasan Kode
- `fetchUsers()` mengambil data dari API dan menampilkannya.
- Menangani error dan menampilkan pesan loading saat data diambil.

## Lisensi
Open-source, bebas digunakan dan dimodifikasi.



<!-- forminput.php -->
#  Form

Aplikasi ini adalah formulir kontak yang memungkinkan pengguna untuk mengirimkan nama, email, dan pesan. Data formulir akan dikirim menggunakan `axios` ke API eksternal, dan setelah pengiriman berhasil, data akan disimpan di `localStorage`.

## Fitur
- **Input Data**: Pengguna dapat mengisi nama, email, dan pesan.
- **Validasi**: Memastikan semua field wajib diisi.
- **Pengiriman Data**: Mengirimkan data formulir ke API eksternal menggunakan metode `POST`.
- **Pesan**: Menampilkan pesan sukses atau gagal setelah pengiriman.

## Teknologi
- **JavaScript** dengan **axios** untuk pengiriman data dan manipulasi DOM.


## Penjelasan Kode
- **Formulir**: Formulir menerima input nama, email, dan pesan.
- **Submit**: Ketika formulir disubmit, data akan dikirim ke `https://jsonplaceholder.typicode.com/posts`.
- **Pesan**: Pesan sukses atau gagal akan ditampilkan setelah pengiriman.



<!-- paginate.php -->
# Article List with Pagination

Aplikasi ini menampilkan daftar artikel dengan pagination. Pengguna dapat menavigasi antar halaman untuk melihat lebih banyak artikel.

## Fitur
- **Daftar Artikel**: Artikel ditampilkan dalam bentuk list, menampilkan judul dan isi.
- **Pagination**: Menampilkan pagination untuk mengubah halaman artikel (Previous, Next, dan nomor halaman).
- **Dinamika**: Halaman akan otomatis memuat artikel dari API saat tombol pagination diklik.

## Teknologi

- **JavaScript** dengan **Axios**: Mengambil data dari API eksternal (JSONPlaceholder) dan menampilkan artikel pada halaman sesuai dengan pagination.


- **API Call**: Menggunakan Axios untuk mengambil data artikel dari `https://jsonplaceholder.typicode.com/posts`.
- **Pagination**: Navigasi dilakukan dengan tombol "Previous" dan "Next", serta nomor halaman yang dapat diklik.
- **Dinamis**: Daftar artikel dan pagination diperbarui secara dinamis setiap kali halaman berubah.


<!-- login.php -->
# Halaman Login

Halaman login ini memungkinkan pengguna untuk melakukan autentikasi menggunakan username dan password. Jika kredensial yang dimasukkan benar, pengguna akan diarahkan ke halaman sukses dan token disimpan di `localStorage`. Jika salah, pesan kesalahan akan ditampilkan.

## Fitur Utama

- **Formulir Login**: Menyediakan input untuk username dan password.
- **Validasi Kredensial**: Kredensial yang valid adalah:
  - Username: `admin@gmail.com`
  - Password: `12345678900`
- **Penyimpanan Token**: Jika login berhasil, token simulasi (`12345abcde`) disimpan di `localStorage`.
- **Pesan Umpan Balik**: Menampilkan pesan sukses jika login berhasil atau pesan kesalahan jika login gagal.

## Struktur Halaman

- **Formulir Login**:
  - `Username`: Input teks untuk memasukkan username.
  - `Password`: Input teks untuk memasukkan password.
  - `Tombol Login`: Tombol untuk mengirim formulir.

- **Pesan**: Menampilkan pesan kesalahan atau keberhasilan login.

## Cara Kerja

1. Pengguna mengisi formulir dengan username dan password.
2. Setelah tombol "Login" ditekan:
   - JavaScript memvalidasi kredensial.
   - Jika valid, token disimpan di `localStorage` dan pesan sukses ditampilkan.
   - Jika tidak valid, pesan kesalahan akan muncul.

## Teknologi yang Digunakan

- **JavaScript**: Untuk menangani logika login dan penyimpanan token.
- **Axios**: Library untuk mengirim permintaan HTTP .

