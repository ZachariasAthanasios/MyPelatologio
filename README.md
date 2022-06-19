# MyPelatologio
Content Management System (CMS) using HTML, CSS, JavaScript, PHP, MySQL | Live Preview soon available

![Project Image](https://cdn.discordapp.com/attachments/924363712821882890/987764423412297759/project-image.png)

---

### Table of Contents

- [Description](#description)
- [How To Use](#how-to-use)
- [License](#license)
- [Author Info](#author-info)

---

## Description

Content Management System (CMS) using HTML, CSS, JavaScript, PHP, MySQL. 
Αn app for Freelancers to track their sales.

#### Technologies

- HTML
- CSS
- JavaScript
- PHP
- MySQL

[Back To The Top](#mypelatologio)

---

## How To Use

#### Project Setup

For localhost use you will need [Xampp](https://www.apachefriends.org/download.html)
<br>
Save the project in htdocs folder inside the xampp folder.
<br>
Last step, go to: [127.0.0.1/MyPelatologio/index.php](http://127.0.0.1/MyPelatologio/index.php)
<br>
Don't forget to setup the database in [phpmyadmin](http://127.0.0.1/phpmyadmin).

#### SMTP Setup

Do not forget to enter your own SMTP details. I use Outlook because Gmail doesnt work. <br>
In the smtp.db.php file
- $mail->Username = 'YOUR EMAIL';  |  The email address that will send the emails
- $mail->Password = 'YOUR PASSWORD';  |  The password
- $mail->setFrom('SEND FROM THAT EMAIL', 'Username');  |  The email address that will send the emails and Τhe username of the email address where it will appear in the messages
- $mail->addReplyTo('info@REPLY EMAIL.com', 'Information');  |  Your Reply Email address

#### Create the database

CREATE DATABASE mypelatologio;<br>

CREATE TABLE admins (<br>
  adminsID int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,<br>
  adminsFname varchar(50) NOT NULL,<br>
  adminsLname varchar(50) NOT NULL,<br>
  adminsEmail varchar(50) NOT NULL,<br>
  adminsPhone varchar(50) NOT NULL,<br>
  adminsUsername varchar(50) NOT NULL,<br>
  adminsPassword varchar(50) NOT NULL,<br>
  adminsRole varchar(50) NOT NULL,<br>
  adminsCreate_at datetime NOT NULL DEFAULT current_timestamp()<br>
);<br>

CREATE TABLE customers (<br>
  customersID int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,<br>
  customersFname varchar(50) NOT NULL,<br>
  customersLname varchar(50) NOT NULL,<br>
  customersEmail varchar(50) NOT NULL,<br>
  customersPhone varchar(50) NOT NULL,<br>
  customersCompany varchar(50) NOT NULL,<br>
  customersAddress varchar(50) NOT NULL,<br>
  customersLevel varchar(50) NOT NULL,<br>
  customersCreate_at datetime NOT NULL DEFAULT current_timestamp()<br>
);<br>

CREATE TABLE orders (<br>
	ordersID INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,<br>
	ordersService VARCHAR(50) NOT NULL,<br>
	ordersNameCustomer VARCHAR(50) NOT NULL,<br>
	ordersEmailCustomer VARCHAR(50) NOT NULL,<br>
	ordersStatus VARCHAR(50) NOT NULL,<br>
	ordersReceipt INT(11) NOT NULL, <br>
	ordersCreate_at datetime NOT NULL DEFAULT current_timestamp()<br>
);<br>

CREATE TABLE resetPasswords (<br>
	resetPasswordsID INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,<br>
	resetPasswordsCode VARCHAR(255) NOT NULL,<br>
	resetPasswordsEmail VARCHAR(50) NOT NULL<br>
);<br>

[Back To The Top](#mypelatologio)

---

## License

MIT License

Copyright © [2022] [Zacharias Athanasios]

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

[Back To The Top](#mypelatologio)

---

## Author Info

- LinkedIn - [Athanasios Zacharias](https://www.linkedin.com/in/athanasios-zacharias/)
- Instagram - [@zacharias_thanos](https://www.instagram.com/zacharias_thanos/)

[Back To The Top](#mypelatologio)

---

