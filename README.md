# 🛍️ Kei Store - Fragrance E-Commerce System

Kei Store adalah website e-commerce parfum dengan fitur **AI recommendation, cart system, checkout, dan stock management** berbasis PHP + MySQL + Bootstrap.

---

## 🚀 Fitur Utama

### 🧠 AI Recommendation System
- Rekomendasi parfum berdasarkan:
  - Cuaca panas
  - Cuaca dingin
  - Masculine (iris & leather)
  - Romantic
- Menampilkan produk relevan + penjelasan aroma

---

### 🛍️ Catalog Produk
- Menampilkan daftar parfum dari database
- Informasi:
  - Nama parfum
  - Brand
  - Harga
  - Notes aroma
  - Stock real-time
- Tombol tambah ke keranjang

---

### 🛒 Shopping Cart
- Tambah / kurangi jumlah produk (qty)
- Hapus item dari cart
- Auto total harga
- Session-based cart system

---

### 💳 Checkout System
- Ringkasan belanja
- Pilihan metode pembayaran (dummy):
  - Bank Transfer
  - E-Wallet
  - Credit Card
- Validasi stok sebelum checkout
- Stok otomatis berkurang setelah pembelian
- Tombol kembali ke keranjang

---

### 📦 Stock Management
- Setiap produk memiliki stok di database
- Tidak bisa membeli lebih dari stok tersedia
- Produk otomatis disabled jika stok habis

---

### 🎨 UI/UX
- Bootstrap 5 responsive design
- Animasi cart (bounce effect)
- Toast notification saat tambah produk
- Clean & modern layout

---

## 🧰 Tech Stack

- PHP (Native)
- MySQL (phpMyAdmin)
- Bootstrap 5
- HTML/CSS/JS
- Laragon

---

## 🗄️ Database Structure

Table: `products`

| Field | Type |
|------|------|
| id | INT |
| name | VARCHAR |
| brand | VARCHAR |
| price | INT |
| notes | TEXT |
| image | VARCHAR |
| stock | INT |

---

## ⚙️ Cara Menjalankan

1. Clone repository:
```bash
git clone https://github.com/keiftr/keistore.git