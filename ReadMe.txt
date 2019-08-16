INSTALASI WAITING ROOM


1. di command line execute "php artisan key:generate"

2. di cronjob tambahkan "* * * * * cd {/path to your project} && php artisan schedule:run >> /dev/null 2>&1"
	tanpa tanda petik dan ganti {/path to your project} dengan path project

3. Untuk setting email di file .env 

contoh di .env:

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=exampleemail@gmail.com
MAIL_PASSWORD="password" (jangan lupa petik untuk password)
MAIL_ENCRYPTION=tls

4. Untuk setting DB di file .env

contoh di .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbname
DB_USERNAME=dbusername
DB_PASSWORD=dbpassword

5. execute MeetingRoom.sql di mysql DB

6. untuk setting template email ada di file resources/views/email.blade.php

7. akses admin page di /admin dengan login 

username: admin
password: adminXmeetingYroomZ2019

8. ganti password bisa di db dengan hash bcrypt di https://bcrypt-generator.com/

9. di command line execute "php artisan serve" tanpa tanda petik

10. bila ada pertanyaan mohon email jeremiarm5@gmail.com atau WA 085749422933  