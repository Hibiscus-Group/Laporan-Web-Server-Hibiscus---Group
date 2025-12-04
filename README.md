# Laporan Web Server Nginx - Hibiscus 

 ## **👥 Anggota Kelompok — Hibiscus Group**

* **Alya Destiani – 5**
* **Nasya Adinda Rahayu – 21**
* **Nazril Gunawan – 22**
* **Putri Marlina – 24**

---

# **1. Akses Server**

## **A. Akses Menggunakan SSH Client**

---

### **a) CMD / Terminal (SSH)**

```bash
ssh kahiang@<ip-server>
```

> **⚠️ CATATAN:**
>
> * Tidak dapat login sebagai **root** (dibatasi oleh server).
> * Gunakan `sudo` untuk menjalankan perintah penting.

Contoh:

```bash
sudo apt install php
sudo nano /var/www/html/index.php
```

---

### **b) WinSCP**

Gunakan akun **kahiang** karena root tidak dapat login langsung.

**Pengaturan WinSCP:**

| Field     | Isi         |
| --------- | ----------- |
| Host Name | Hibicus     |
| User      | kahiang     |
| Password  | @kahiang123 |

Masuk ke:
**Advanced → Environment → SFTP**
Isi:

```
sudo /usr/lib/openssh/sftp-server
```

> **💡 TIPS:**
> Jika edit file tidak tersimpan, pastikan kamu menggunakan **Save (Ctrl+S)** di editor internal WinSCP, bukan hanya *Close*.

---

### **c) CMD (Akses Biasa)**

```bash
ssh kahiang@<ip-server>
```

> **⚠️ INGAT:** Perintah yang butuh akses tinggi tetap memakai `sudo`.

---

## **B. WinSCP untuk Edit & Transfer File**

WinSCP memudahkan proses upload, edit, dan pemindahan file tanpa harus menulis banyak perintah terminal.

> **💡 TIPS:**
> Gunakan fitur **Edit → Keep remote directory up to date** untuk upload otomatis bila perlu.

---

## **C. Instalasi & Koneksi Web Server**

* Pastikan Debian sudah memiliki IP.
* Repository aktif.
* Server dapat di-ping dari LAN.

---

# **2. Konfigurasi Dasar Nginx**

Update package:

```bash
apt update && apt upgrade
```

Instal:

```bash
apt install nginx
```

Aktifkan:

```bash
systemctl start nginx
systemctl enable nginx
```

Cek:

```bash
systemctl status nginx
```

Akses browser:
➡️ **[http://ip-server](http://ip-server)**

> **💡 TIPS:**
> Jika tampilan tidak muncul, cek apakah firewall mengizinkan port 80.

---

# **3. Instal & Uji PHP pada Nginx**

## **A. Instalasi PHP-FPM**

```bash
apt install php8.4-fpm php8.4-cli
```

Cek status:

```bash
systemctl status php8.4-fpm
```

---

## **B. Konfigurasi Nginx untuk PHP**

Backup file bawaan:

```bash
mv /etc/nginx/sites-available/default /etc/nginx/sites-available/default.asli
```

Edit konfigurasi:

```bash
nano /etc/nginx/sites-available/default
```

Setelah selesai:

```bash
nginx -t
systemctl restart nginx
```

> **❗ LARANGAN:**
> Jangan menggunakan tab ganda dalam konfigurasi Nginx. Gunakan **spasi**, karena indent salah → error.

---

## **C. Uji PHP**

```bash
nano /var/www/html/info.php
```

Isi:

```php
<?php phpinfo(); ?>
```

Akses:
➡️ **[http://ip-server/info.php](http://ip-server/info.php)**

---

# **4. Menambahkan SSL Self-Signed**

## **A. Membuat Sertifikat**

```bash
mkdir /etc/ssl/nginx
apt install openssl
openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
-keyout /etc/ssl/nginx/selfsigned.key \
-out /etc/ssl/nginx/selfsigned.crt
```

> **⚠️ CATATAN:**
> Isi data di prompt OpenSSL boleh asal, karena *self-signed* tidak diverifikasi publik.

---

## **B. Konfigurasi HTTPS di Nginx**

Edit:

```bash
nano /etc/nginx/sites-available/default
```

Tambahkan konfigurasi port **443**.

Restart:

```bash
nginx -t
systemctl restart nginx
```

Akses:
➡️ **[https://ip-server](https://ip-server)**

> **💡 TIPS:**
> Browser akan memberi warning *Not Secure* → klik **Advanced → Proceed**.

---

# **5. Kelebihan & Kekurangan Nginx**

## **🌟 Kelebihan**

* Performa tinggi & ringan.
* Stabil (jarang perlu restart).
* Cepat dalam menyajikan file statis.
* Hemat CPU & RAM.

## **⚠️ Kekurangan**

* Modul tidak bisa di-*reload* secara dinamis.
* Kurva belajar cukup tinggi.
* Cenderung kurang fleksibel untuk aplikasi lama.

---

# **6. Perjalanan Project Website**

## **A. Pembuatan Project Kelompok**

Tema dipilih menggunakan warna **#006994**, konsep formal dengan animasi ringan.

AI membantu memberikan ide desain, tetapi penulisan & struktur dilakukan manual.

> **💡 TIPS:**
> Gunakan *live preview* HTML untuk memudahkan debugging tampilan.

Kendala muncul pada WinSCP yang tidak menyimpan file → akhirnya pindah ke CMD.
Setelah belajar dari teman lintas kelompok, baru paham cara kerja WinSCP 😆.

Akhirnya tampilan awal website berhasil!

---

## **B. Upload Project ke Server**

Transfer dilakukan melalui WinSCP.
Beberapa error kecil muncul, tetapi dapat diselesaikan.

---

## **C. Pembuatan Project Individu**

* **Alya Destiani – 5**
* **Nasya Adinda Rahayu – 21**
* **Nazril Gunawan – 22**
* **Putri Marlina – 24**

Awalnya bingung membuat file pribadi yang bisa dipanggil dari index.
Beruntung dapat penjelasan dari teman lintas kelompok sehingga langsung paham.

Setiap anggota membuat halaman dengan tema seragam agar rapi dan selaras.

---

# **7. Kendala & Solusi**

## **a. Kesulitan Memahami Perintah**

Beberapa perintah terasa asing.

> **Solusi:**
> Diskusi dengan teman + bantuan AI → paham pelan-pelan.

---

## **b. Bingung Menggunakan WinSCP**

Edit file tidak tersimpan.

> **Solusi:**
> Menggunakan mode editor internal WinSCP yang benar.

---

## **c. Website Tidak Muncul Setelah Dipindah**

Masalah: **Apache masih berjalan, bentrok dengan Nginx**.

```bash
systemctl stop apache2
systemctl disable apache2
systemctl restart nginx
```

---

## **d. File Website Individu Tidak Terpanggil**

Ada **dua file index** dalam satu folder.

> **Solusi:**
> Hapus file yang tidak dipakai → server bisa memanggil yang benar.

 # **📌 Kesimpulan**

Pengerjaan proyek web server berbasis **Nginx di Debian** memberikan banyak pengalaman teknis sekaligus pembelajaran baru bagi kelompok kami. Kami belajar bagaimana mengakses server menggunakan SSH dan WinSCP, melakukan instalasi layanan seperti **Nginx**, **PHP-FPM**, serta membuat **SSL self-signed** untuk koneksi HTTPS.

Meskipun menghadapi beberapa kendala — seperti bentroknya layanan Apache, file yang tidak tersimpan di WinSCP, hingga kesalahan struktur folder — setiap masalah dapat diselesaikan melalui diskusi, percobaan, dan bantuan teman lintas kelompok. Seluruh proses ini membuat kami lebih paham cara kerja server dan konfigurasi web secara nyata.

Akhirnya, website kelompok dan halaman individu setiap anggota dapat berjalan dengan baik di server. Melalui tugas ini, kami menyadari pentingnya ketelitian, kerja sama, serta pemahaman dasar sistem Linux untuk membangun web server yang stabil dan fungsional.

> **Kesimpulan Akhir:**
> Tugas ini tidak hanya melatih kemampuan teknis, tetapi juga meningkatkan kemampuan kolaborasi dan pemecahan masalah dalam membangun dan mengelola sebuah web server profesional.

## 🎬 Dokumentasi Video Pengerjaan
[![Thumbnail Video Pengerjaan](https://img.youtube.com/vi/6CTRWvtc95A?si=BLBRYXNvOaDBQNhW.jpg)](https://youtu.be/6CTRWvtc95A?si=BLBRYXNvOaDBQNhW)

~ Kelompok 8 - Hibiscus - XI TJKT ~
