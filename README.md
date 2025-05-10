# Leads Management

Aplikasi web untuk mengelola, memfilter, dan men-generate report data leads secara dinamis, lengkap dengan fitur export PDF/Excel dan template report yang dapat disimpan.

---

## Fitur Utama
- **Filter Data Leads** berdasarkan kriteria yang dipilih.
- **Pilih Field Data** yang ingin ditampilkan di report.
- **Simpan Template Report** (kombinasi filter & field).
- **Lihat, Hapus, dan Gunakan Template Report** yang sudah pernah dibuat.
- **Export Report** ke PDF dan Excel.

---

## Cara Instalasi & Setup

### 1. **Clone Project**
```
git clone <repo-anda>
cd Leads-Management
```

### 2. **Install Dependency**
```
composer install
npm install (jika menggunakan frontend asset build)
```

### 3. **Copy & Edit .env**
```
cp .env.example .env
```
- Atur koneksi database di file `.env` sesuai environment Anda.

### 4. **Generate Key**
```
php artisan key:generate
```

### 5. **Migrasi Database**
```
php artisan migrate
```

### 6. ** Seed Data Leads**
```
php artisan db:seed
```

### 7. **Jalankan Server**
```
php artisan serve
```
Akses aplikasi di [http://localhost:8000](http://localhost:8000)

---

## Cara Penggunaan
1. **Pilih kriteria filter** dan **field data** yang diinginkan.
2. **Simpan kombinasi** sebagai template report.
3. **Lihat daftar template** di panel kanan, gunakan atau hapus sesuai kebutuhan.
4. **Centang report** yang ingin di-export, lalu klik **Cetak** untuk download PDF/Excel.

---

## Teknologi yang Digunakan
- Laravel (PHP)
- Bootstrap 5 (UI)
- [maatwebsite/excel](https://laravel-excel.com/) (Export Excel)
- [barryvdh/laravel-dompdf](https://github.com/barryvdh/laravel-dompdf) (Export PDF)

---

## Catatan
- Pastikan ekstensi PHP `gd` aktif untuk export Excel/PDF.
- Semua field dan filter dapat diubah/dikembangkan sesuai kebutuhan bisnis.

---

## Kontak
Untuk pertanyaan lebih lanjut, silakan hubungi developer atau HRD yang bertanggung jawab atas project ini.
