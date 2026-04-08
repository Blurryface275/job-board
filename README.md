## Setup

```bash
git clone https://github.com/Blurryface275/job-board.git
cd job-board
composer install
cp .env.example .env
php artisan key:generate
# Configure DB credentials in .env
php artisan migrate
php artisan db:seed
php artisan serve
```
