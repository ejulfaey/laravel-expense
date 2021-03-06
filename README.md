# Expense Apps

Simple expense tracker..

## Updates!!!

1. Moved logical operation from `web.php` to `App\Http\Controllers\ExpenseController`.
2. All routes have name, you can navigate to the page just calling by their name instead of endpoint(eg:/foo/bar/test/).
3. Check the API code in `routes\api.php` & `App\Http\Controllers\Api\ExpenseController`.

## API Documentation

### You can use API tools such as [Postman](https://www.getpostman.com/) for better testing.

`http://localhost:8000/api + Endpoint`

Method | Endpoint | Parameter(s)|
---|---|---|
GET | `/list` | - |
POST | `/store` | `item_id`, `amount` |
GET | `/view/{id}` | - |
PUT | `/update/{id}` | `item_id`, `amount` |
DELETE | `/delete/{id}` | - |

## Steps to clone project

1. Open your terminal or command prompt, then copy/paste the command given:
    1. `git clone https://github.com/ejulfaey/laravel-expense.git <your-project-name>`
    2. `cd <your-project-name>`
    3. `composer install`
    4.  Copy from .env.example to .env
    5.  Configure your database connection.
    6.  `php artisan key:generate`
    7.  `composer dump-autoload`
    8.  `php artisan config:cache`
    9.  `php artisan migrate`
2. Done, you may run the application. Good Luck!
