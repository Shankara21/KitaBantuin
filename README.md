<h1 align="center">Selamat datang di website Kami! 👋</h1>

## Apa itu kITabantuin.co?

KitaBantuin.co merupakan sebuah bisnis berbasis IT yang menyediakan layanan pengerjaan proyek atau pekerjaan yang terkait dengan IT.

Fokus utama bisnis ini adalah membantu masyarakat yang tidak memiliki background IT dalam mengembangkan usaha, bisnis, atau pekerjaan mereka sehingga dapat lebih dikenal masyarakat secara luas. 

Dengan adanya bisnis ini, nantinya akan dapat membantu mahasiswa yang ingin mendapatkan penghasilan tambahan, maupun meningkatkan skill yang dimilikinya. Bisnis ini juga dapat membantu mereka yang memiliki kemampuan IT untuk menyalurkan bakat tersebut.
 👋👋

## Fitur apa saja yang tersedia di Laundry?

-   Autentikasi Admin
-   Category & CRUD
-   Member & CRUD
-   User & CRUD
-   Product & CRUD
-   Dan lain-lain

## Release Date

**Release date : 22 September 2022**


---

## Default Account for testing

**Admin Default Account**

-   Username: admin@mail.com
-   Password: admin

**Pegawai Default Account**

-   Username: pegawai@mail.com
-   Password: pegawai

---

## Install

1. **Clone Repository**

```bash
git clone https://github.com/Shankara21/Kitabantuin.git
cd Kitabantuin
composer install
npm install
cp .env.example .env
```

2. **Buka `.env` lalu ubah baris berikut sesuai dengan databasemu yang ingin dipakai**

```bash
DB_PORT=3306
DB_DATABASE=apotek
DB_USERNAME=root
DB_PASSWORD=
```

3. **Instalasi website**

```bash
php artisan key:generate
php artisan migrate --seed
php artisan jwt:secret
php artisan config:cache
```

4. **Jalankan website**

```bash
php artisan serve
```

## License

-   Copyright © 2022 
