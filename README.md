# Please follow the instructions

`Server Requirements:` Php server & CLI version >= 8.1  
- clone this git repository  
- copy `.env.example` to `.env`  
- configure all info in `.env`  
- run command `composer install`  
- run command `php artisan key:generate`  
- set your email configuration in `.env` file  
- run command `php artisan migrate`  
- run command `php artisan optimize:clear`  
- run command `php artisan optimize`  
- run command `php artisan serve`  

# Additional Commands:

### Pusher Setup (for Real-Time Product Updates)

1. Sign up at [https://pusher.com](https://pusher.com) and create a new app.
2. Copy your **App ID**, **Key**, **Secret**, and **Cluster**.
3. Update the following keys in your `.env` file:


