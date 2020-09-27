## Qemal Stafa HS Management System (Qemal Stafa HS MNS)

**Qemal Stafa HS MNS** is a simple role based school management system, developed to come in help of the students in Qemal Stafa High School.

## Prerequisites (To run the project locally)
You should have a Windows x64 host for better running performance.
You should have Apache MySQL and PHP installed.
You should have NodeJS installed.

### Installation Steps
1. `cd qshsmns`
2. `composer install`
3. `npm install`
4. `cp .env.example .env`
5. `php artisan key:generate`
6. `php artisan migrate --seed`
7. `php artisan serve`

### Additional Notes
-   Director Credentials    :   Email = director@gmail.com; password = director123
-   Teacher Credentials     :   Email = teacher@gmail.com;  password = teacher123
-   Parent Credentials      :   Email = parent@gmail.com;   password = parent123
-   Student Credentials     :   Email = student@gmail.com;  password = student123