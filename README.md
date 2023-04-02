# gooddeeds

1. composer install
2. npm install
3. npm run dev
4. php artisan serve 
5. regester and login 
6. php artisan csv:generate 20 (command for generate CSV file)
7. php artisan queue:listen (run job)
8. API's 
  7.1 :- Login (use email and password of 5th step)
  http://127.0.0.1:8000/api/login 

    {
        "email":,
        "password":
    }

    8.2:- data insert from csv file (use token of login response for authentication )
    http://127.0.0.1:8000/api/csv_data




