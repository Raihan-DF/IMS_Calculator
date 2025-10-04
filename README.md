# 💰 Aplikasi Simulasi Kredit

Aplikasi sederhana berbasis **Laravel** untuk menghitung dan menampilkan simulasi kredit kendaraan berdasarkan **harga OTR**, **DP**, **tenor**, dan **suku bunga**.  
Sistem ini juga otomatis membuat **jadwal angsuran** dengan rumus **anuitas**.

---

## 🚀 Fitur Utama

- Input data kredit (nama pelanggan, harga OTR, DP, tenor).  
- Perhitungan otomatis **pokok pinjaman**, **bunga**, dan **angsuran bulanan**.  
- Penentuan suku bunga berdasarkan tenor:
  - < 12 bulan → 12%  
  - 12–24 bulan → 14%  
  - > 24 bulan → 16.5%  
- Pembuatan **nomor kontrak unik**.  
- Pembuatan dan penyimpanan **jadwal angsuran otomatis**.  
- Tampilan hasil perhitungan dan jadwal dalam bentuk tabel.

---

**Keterangan:**
- `A` = Angsuran per bulan  
- `P` = Pokok pinjaman  
- `r` = Suku bunga per bulan  
- `n` = Jumlah bulan (tenor)

---

## 🛠️ Teknologi yang Digunakan

- **Laravel 11**
- **PHP 8+**
- **Carbon** (manipulasi tanggal)
- **Blade Template Engine**

---

## 📂 Struktur Utama Proyek

