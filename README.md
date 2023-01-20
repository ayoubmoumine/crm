# CRM - To manage companies and their employees

A CRM project based on Laravel, It has two different spaces, one dedicated for the admins (Backoffice) and second dedicted for the employees (Frontoffice), and it containes the following modules ( Administors Management, Companies Management, Employees Management and Invitations Management ) + Sending email to an employee when an invitation if created by the admin to join the plateform under a specific company

## Install

1) Run in your terminal:

``` bash
git clone https://github.com/ayoubmoumine/crm.git
```

2) Configure your host:
inside your host file add the following line : ```127.0.0.1 crm.com www.crm.com admin.crm.com```

3) Configure your VirtualHost : ( subdomain is being used  )
Add the following site
```bash
<VirtualHost *:80>
  ServerName crm.com
  ServerAlias crm.com
  ServerAlias www.crm.com
  ServerAlias admin.crm.com
  DocumentRoot <PUT_HERE_THE_PATH_TO_YOUR_PUBLIC_FOLDER>
  <Directory <PUT_HERE_THE_PATH_TO_YOUR_PROJECT>
    Options +Indexes +Includes +FollowSymLinks +MultiViews
    AllowOverride All
    Require local
  </Directory>
</VirtualHost>
```

4) Restart your web server 


5) Set your database information in your .env file (use the .env.example as an example);


6) Always in the .env file, set ```APP_NAME``` value, cause it s being used in the invitation email, you can give it whatever value you wish


7) Again in the .env file, set a mail server configuration
here is an example of one from MailTrap.io
``` bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=<insert_here_mailtrap_inbox_username>
MAIL_PASSWORD=<insert_here_mailtrap_inbox_password>
MAIL_ENCRYPTION=tls
```
You can feel free to any other smtp server configuration

8) Back to the terminal cd to your project folder and run the following commands:
``` bash
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
```

Note: The seed is to insert records into admins table
Note 2: password to the seeded admins is: ```password```



## After the installation

Once you finish the installation you can access the project.
For the admin space use the following link : ```admin.crm.com/admin/login``` to land on the login page

For the Employees space use the following link : ```www.crm.com/login``` or ```crm.com/login```