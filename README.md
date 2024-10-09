# Laravel-Cafe

Bu proje bir Laravel uygulamasıdır. Aşağıdaki adımları izleyerek projeyi yerel ortamda Laragon kullanarak çalıştırabilirsiniz.

## Gereksinimler

Proje için aşağıdaki gereksinimlere sahip olmanız gerekmektedir:

- Laragon (PHP, MySQL ve Apache/Nginx otomatik gelir)
- Composer
- Node.js & NPM (Laravel Mix için)

## Laragon ile Kurulum Adımları

1. **Laragon'u indirin ve kurun:**

   Laragon'u [resmi web sitesinden](https://laragon.org/download/) indirin ve bilgisayarınıza kurun.

2. **Projeyi klonlayın:**

   Laragon'un `www` dizinine projenizi klonlayın. Örneğin:

   ```bash
   cd C:/laragon/www
   git clone https://github.com/ErdalT1/Laravel.git
   cd Laravel
3. **Bağımlılıkları yükleyin:**
   ```bash
   composer install
   npm install
5. **Veritabanı ayarlarını yapılandırın:**
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=veritabani_adi //phpMyAdmin üzerinde oluşturduğunuz herhangi bir veri tabanının ismini verebilirsiniz.
    DB_USERNAME=root
    DB_PASSWORD=
7. **Veritabanını oluşturun:**
   ```bash
   php artisan migrate
   php artisan db:seed
6.**Geliştirme sunucusunu başlatın:**
   Laragonu çalıştırın.
   Terminale şu komutu girin:
   ```bash
   php artisan serve
Uygulama tarayıcıda http://127.0.0.1:8000 adresinden erişilebilir olacaktır.





    

