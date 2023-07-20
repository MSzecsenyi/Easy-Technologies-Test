To run the project:
- create an empty file at database/database.sqlite
- run init.bat
- add mailer data to .env file
- start server -- php artisan serve
- init queue worker -- php artisan queue:work --queue=emails
- Repo includes Postman collection to easily access functions
