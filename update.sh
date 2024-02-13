git checkout package-lock.json
git pull
composer install
php artisan migrate --force
php artisan db:seed --force
php artisan cache:clear
php artisan config:clear
npm install
npm run build
