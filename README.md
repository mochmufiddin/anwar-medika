
# Test for IT programmer in Anwar Medika Hospital

Medication Prescribing Web-Application 

## Prepare environment (laravel 11):
1. PHP 8.3.9
2. Node v20.15.0
3. Composer version 2.7.7

  

## How To Install
  

-  **Clone Git Repository**
`git clone https://github.com/masdudung/anwar-medika`



-  **Setup Environment**
Copy `.env.example` to `.env` to configure environment variables.

  

-  **Prepare Database**
Create empty database according to env, in this case  `anwar_medika`
  
-  **Install Dependencies**
a. Enter Project directory
b. type `composer install`
c. type `npm install`
d. type `php artisan key:generate`
e. type `php artisan migrate:fresh --seed`
f. type `npm run dev`
g. open another terminal then `php artisan serve`, it will show the project URL.


-  **Doctor Credential**
a. rizal@anwarmedika.com | CacingBercula1
a. siti@anwarmedika.com | CacingBercula1

-  **Pharmacist Credential**
a. rudi@anwarmedika.com | CacingBercula1
a. tuti@anwarmedika.com | CacingBercula1
  

## What Can be Improve?

- Curently use Repository design pattern, we can register in service provider to make dependency injection created automatically

- Use Spatie Permission, can be improve with action based permission

- Cache use database driver, we can optimise use memchace or Redis

- For logging, there is no user interface, we can make it later. Log saved in databases

- Use Local Storage, we can improve quality of service use cloud storage. 

- Notification Feature when Examination's State have been changed
-  Use Serverside Datatable to show Examination List

- And Many More

## Design Choices

-  `Repository Pattern:`

  
By using the repository pattern, we separate the data access logic from the business logic. This makes the codebase more modular, easier to maintain, and testable.

## Conclusion
I am very happy to reach this test stage, there are things beyond control that happened while working on the test. The time given is quite long, but unfortunately I can only work on Sunday because before that I still have to work full time (you can check in github commit).
Regardless of the obstacles, I am triggered to be better at writing code and managing time.

Thank you all, warm regards
Moch Mufiddin