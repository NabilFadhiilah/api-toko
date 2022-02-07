<!-- GETTING STARTED -->
## Getting Started

Intruksi Penggunaan Aplikasi API-Toko Menggunakan Laravel 8

### Prerequisites 
Bisa download melalui zip atau git clone menggunakan command line atau pakai github desktop
* command git clone
  ```sh
  gh repo clone NabilFadhiilah/api-toko
  ```
 
### Installation 
Gunakan Command Line Di Bawah Ini Di Terminal
* Composer
  ```sh
  composer update
  ```
  
Selanjutnya pembuatan tabel
> Jangan Lupa ubah .env.example menjadi .env dan buat database yang sesuai dengan di .env
* Artisan
  ```sh
  php artisan migrate
  ```

Seeding Database
* Artisan
  ```sh
  php artisan db:seed ProductSeeder
  ```
  ```sh
  php artisan db:seed CustomerSeeder
  ```
  
### Usage

Gunakan Command Line ini di terminal
```sh
php artisan serve
```


### Built With
* [Laravel](https://laravel.com)
* [Bootstrap](https://getbootstrap.com)
* [JQuery](https://jquery.com)

<p align="right">(<a href="#top">back to top</a>)</p>
