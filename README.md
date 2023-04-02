# gooddeeds

1. composer install
2. npm install
3. npm run dev
4. php artisan passport:install
5. php artisan migrate
6. php artisan serve 
7. register and login 

8. php artisan csv:generate 20 (command for generate CSV file)
9. API's 
  9.1 :- Login (use email and password of 5th step)
  Type = POST
  http://127.0.0.1:8000/api/login 

    {
        "email":,
        "password":
    }

  9.2:- data insert from csv file (use token of login response for authentication )
  Type = POST
  http://127.0.0.1:8000/api/csv_data




