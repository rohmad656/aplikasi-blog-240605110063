# Proyek Aplikasi Blog - Sistem Manajemen Konten (CMS) & Halaman Pengunjung

Proyek ini dikembangkan untuk memenuhi syarat Ujian Akhir Semester (UAS) mata kuliah Pemrograman Web.

## Identitas Mahasiswa

- **Nama Lengkap:** Muhammad Nurrohmad Mujahidin
- **NIM:** 240605110063
- **Dosen Pengampu:** A’la Syauqi M.Kom.
- **Proyek Akademik:** Proyek Aplikasi Blog (UAS Genap 2025/2026)
- **Tautan Video Demonstrasi (YouTube):** [CMS](https://youtu.be/1yE2OP9LsHs)

## Deskripsi Aplikasi

Aplikasi ini adalah platform blog dinamis yang dibangun menggunakan framework Laravel dan basis data MySQL. Fitur aplikasi ini terbagi menjadi dua ruang arsitektur utama:

1. **Control Panel Administrator (CMS Panel):** Ruang terproteksi autentikasi yang digunakan penulis untuk mengelola siklus data (CRUD) Kategori, Penulis, dan Artikel. Layout didesain responsif (menetap di samping kiri pada layar laptop/desktop, dan otomatis _minimize_ menjadi menu hamburger pada layar ponsel/_mobile_). Grafik statistik dan antarmuka disajikan secara bersih, polos, dan minimalis.
2. **Halaman Publik Pengunjung (Visitor Page):** Ruang bebas akses tanpa login yang menampilkan 5 artikel terbaru, fitur penyaringan (_filtering_) artikel berbasis kategori melalui widget samping, serta halaman detail artikel utuh yang dilengkapi rekomendasi daftar artikel terkait dalam kategori yang sama.

## Panduan Menjalankan Aplikasi Secara Lokal

### 1. Prasyarat Lingkungan Kerja

- Pastikan aplikasi **Laragon** (layanan Apache dan MySQL) sudah berjalan aktif.
- PHP versi >= 8.2 dan Composer sudah terpasang di perangkat Anda.
- Pastikan database nya sesuai dengan source code

### 2. Kloning Repositori

Buka terminal (Git Bash / PowerShell) di direktori root server lokal Laragon Anda (`C:\laragon\www\`), kemudian jalankan perintah:

```bash
git clone (Link github)
cd (nama folder)
```
