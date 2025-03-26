# mysql
readonly DB_USERNAME="root"
readonly DB_PASSWORD="Root@123"
readonly MYSQL=`which mysql`
readonly Q1="CREATE DATABASE IF NOT EXISTS $1"
$MYSQL -u$DB_USERNAME -p$DB_PASSWORD -e "$Q1"

# laravel
composer install
readonly APP_NAME="$1"
cp .env.example .env
sed -i -e "s/DB_DATABASE=laravel/DB_DATABASE=$1/g" .env
sed -i -e "s/DB_USERNAME=root/DB_USERNAME=$DB_USERNAME/g" .env
sed -i -e "s/DB_PASSWORD=/DB_PASSWORD=$DB_PASSWORD/g" .env
sed -i -e "s/APP_NAME=/APP_NAME=$APPNAME/g" .env
sed -i -e "s/localhost/$APPNAME.local/g" .env

rm .env-e
php artisan key:generate
php artisan optimize:clear
php artisan storage:link

php artisan db:wipe
php artisan migrate
php artisan db:seed
#php artisan make:filament-user --name=admin --email=admin@gmail.com --password=12345678

# web server
echo "127.0.0.1 $1.local" | sudo tee -a /etc/hosts
sudo cp /etc/apache2/conf-enabled/lms.conf /etc/apache2/conf-enabled/$1.conf
sudo sed -i -e "s/lms/$1/g" /etc/apache2/conf-enabled/$1.conf
cat /etc/apache2/conf-enabled/$1.conf
sudo service apache2 restart

npm install
npm run build

curl http://$1.local
sudo chmod 777 -R storage bootstrap/
curl http://$1.local
git checkout -- .
echo "http://$1.local"
