# lernplattform

start backend
php artisan serve

start frontend
npm run watch

# setup project

open folder in terminal

php artisan db:seed

npm install / npm install node-sass@4.14.1

npm run watch

---

new terminal

composer install

php artisan serve

http://127.0.0.1:8000/spa/test aufrufen

Login und Registrierung
http://127.0.0.1:8000/spa/auth

# deploy

git add .

commit -m "message"

git push heroku master

heroku run php artisan migrate

heroku run php artisan db:seed

# setup database

config .env

php artisan migrate

Naming Convention
Zwei Bindestriche Stil
block-name\_\_elem-name--mod-name--mod-val

Namen werden in lateinischen Kleinbuchstaben geschrieben.

Wörter innerhalb der Namen von BEM-Entitäten werden durch einen Bindestrich (-) getrennt.

Der Elementname wird durch einen doppelten Unterstrich (\_\_) vom Blocknamen getrennt.

Boolesche Modifikatoren werden vom Namen des Blocks oder Elements durch einen doppelten Bindestrich (--) getrennt.

Der Wert eines Modifikators wird durch einen doppelten Bindestrich (--) von seinem Namen getrennt.
