:: Ezzel a batch scripttel lehet nullarol inicializalni a Laravel projektet Windows rendszereken
call composer install --no-interaction
copy .env.example .env
call php artisan key:generate
call npm install
:: Egy ures sqlite fajlnak leteznie kell, kulonben a migrate nem mukodik database/database.sqlite helyen
call php artisan migrate:fresh
:: php artisan serve
:: php artisan queue:work --queue=emails
@pause
