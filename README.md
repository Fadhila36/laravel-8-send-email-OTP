# Send Email Verification With OTP (One Time Password)
Send Email Verification With OTP (One Time Password) Menggunakan Laravel 8
    
## Installation 

You can fork or clone this project

``` 
git clone https://github.com/Fadhila36/laravel-8-send-email-OTP.git
cd laravel-8-send-email-OTP
composer install
cp .env.example .env <-- edit db config
ubah MAIL_MAILER di dalam .env menjadi

MAIL_MAILER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=587
MAIL_USERNAME=email@gmail.com
MAIL_PASSWORD=password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=email@gmail.com
MAIL_FROM_NAME="Nama Aplikasi"

php artisan migrate
Php artisan serve

```

