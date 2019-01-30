
## Setup guid line

- Install all the dependencies using composer : composer update
- Generate Key : php artisan key:generate
- Install node packages : npm install
- install the vue-router and vue-axios : npm install vue-router vue-axios --save

Set up database configuration inside .env file

- database : kindhub
- db_user : root
- db_password :
- migrate database tables : php artisan migrate