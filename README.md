# Expense Apps

Simple expense tracker..

## Getting Started

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


## Attention!!!

1. Change logic operation from route.php to App\Http\ExpenseController
2. All routes have name, you can navigate to the page just calling their name instead of endpoint(eg:/foo/bar/test/)
