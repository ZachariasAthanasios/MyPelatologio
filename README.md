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

#### Database Setup

1. Create database

```
CREATE DATABASE mypelatologio;
```

2. Create tables

```
CREATE TABLE admins (
  	adminsID int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  	adminsFname varchar(50) NOT NULL,
  	adminsLname varchar(50) NOT NULL,
  	adminsEmail varchar(50) NOT NULL,
  	adminsPhone varchar(50) NOT NULL,
  	adminsUsername varchar(50) NOT NULL,
  	adminsPassword varchar(50) NOT NULL,
  	adminsRole varchar(50) NOT NULL,
  	adminsCreate_at datetime NOT NULL DEFAULT current_timestamp()
);

CREATE TABLE customers (<br>
	customersID int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  	customersFname varchar(50) NOT NULL,
  	customersLname varchar(50) NOT NULL,
  	customersEmail varchar(50) NOT NULL,
  	customersPhone varchar(50) NOT NULL,
  	customersCompany varchar(50) NOT NULL,
  	customersAddress varchar(50) NOT NULL,
  	customersLevel varchar(50) NOT NULL,
	customersCreate_at datetime NOT NULL DEFAULT current_timestamp()
);

CREATE TABLE orders (
	ordersID INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	ordersService VARCHAR(50) NOT NULL,
	ordersNameCustomer VARCHAR(50) NOT NULL,
	ordersEmailCustomer VARCHAR(50) NOT NULL,
	ordersStatus VARCHAR(50) NOT NULL,
	ordersReceipt INT(11) NOT NULL,
	ordersCreate_at datetime NOT NULL DEFAULT current_timestamp()
);

CREATE TABLE resetPasswords (<br>
	resetPasswordsID INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	resetPasswordsCode VARCHAR(255) NOT NULL,
	resetPasswordsEmail VARCHAR(50) NOT NULL
);
```

3. Insert Data

```
INSERT INTO admins (adminsFname, adminsLname, adminsEmail, adminsPhone, adminsUsername, adminsPassword, adminsRole)
VALUES ("admin", "admin", "admin@gmail.com", "1234567890", "Admin", "123", "SuperAdmin");

INSERT INTO customers (customersFname, customersLname, customersEmail, customersPhone, customersCompany, customersAddress, customersLevel)
VALUES ("Tony", "Smart", "tonysmart@gmail.com", "1234567890", "Tony Smart LTC", "25 Martiou Street", "NewCustomer");

INSERT INTO customers (customersFname, customersLname, customersEmail, customersPhone, customersCompany, customersAddress, customersLevel)
VALUES ("Tommie", "Tommie", "tommienielsen@gmail.com", "1203456852", "About Tech", "40 Ekklision Street", "NewCustomer");

INSERT INTO customers (customersFname, customersLname, customersEmail, customersPhone, customersCompany, customersAddress, customersLevel)
VALUES ("Tomasz", "Monaghan", "tomaszmonaghan@gmail.com", "6789410299", "Vicko AE", "Adamidi Christou Street", "NewCustomer");

INSERT INTO customers (customersFname, customersLname, customersEmail, customersPhone, customersCompany, customersAddress, customersLevel)
VALUES ("Shahid", "Crossley", "shahidcrossley@gmail.com", "2310567894", "Crossley Car Rental", "Acheloou Street", "NewCustomer");

INSERT INTO customers (customersFname, customersLname, customersEmail, customersPhone, customersCompany, customersAddress, customersLevel)
VALUES ("Annabell", "Wilkes", "sarawilkes@gmail.com", "201256789", "Annabell Clothing Brand", "Kalinotses", "NewCustomer");

INSERT INTO customers (customersFname, customersLname, customersEmail, customersPhone, customersCompany, customersAddress, customersLevel)
VALUES ("Franklyn", "Piper", "piperfranklyn@gmail.com", "6798148627", "Piper Pipelines", "Agias Triados Street", "NewCustomer");

INSERT INTO customers (customersFname, customersLname, customersEmail, customersPhone, customersCompany, customersAddress, customersLevel)
VALUES ("Milana", "Stamp", "milanastamp@gmail.com", "7894561233", "Milana Shoes", "26 Oktovriou Street", "NewCustomer");

INSERT INTO customers (customersFname, customersLname, customersEmail, customersPhone, customersCompany, customersAddress, customersLevel)
VALUES ("Mathew", "Olsen", "mathewolsen@gmail.com", "4567891230", "Mathew Tech", "3 Septemvriou Avenue", "NewCustomer");

INSERT INTO customers (customersFname, customersLname, customersEmail, customersPhone, customersCompany, customersAddress, customersLevel)
VALUES ("Mahi", "Copeland", "mahicopeland20@gmail.com", "9874563215", "Copeland Accessories", "Adramyttiou Street", "NewCustomer");

INSERT INTO customers (customersFname, customersLname, customersEmail, customersPhone, customersCompany, customersAddress, customersLevel)
VALUES ("Kristian", "Howells", "kristianhowells@gmail.com", "2350704091", "Kristian Book Rental", "Anaktoriou Street", "NewCustomer");

INSERT INTO orders (ordersService, ordersNameCustomer, ordersEmailCustomer, ordersStatus, ordersReceipt)
VALUES ("Eshop", "Tony Smart", "tonysmart@gmail.com", "Pending", "450");

INSERT INTO orders (ordersService, ordersNameCustomer, ordersEmailCustomer, ordersStatus, ordersReceipt)
VALUES ("Digital Marketing", "Tommie Nielsen", "tommienielsen@gmail.com", "Delivered", "100");

INSERT INTO orders (ordersService, ordersNameCustomer, ordersEmailCustomer, ordersStatus, ordersReceipt)
VALUES ("Business Website", "Annabell Halliday", "annabellhalliday@gmail.com", "Delivered", "150");

INSERT INTO orders (ordersService, ordersNameCustomer, ordersEmailCustomer, ordersStatus, ordersReceipt)
VALUES ("SEO", "Shahid Crossley", "shahidcrossley@gmail.com", "Delivered", "50");

INSERT INTO orders (ordersService, ordersNameCustomer, ordersEmailCustomer, ordersStatus, ordersReceipt)
VALUES ("Eshop", "Mahi Copeland", "mahicopeland20@gmail.com", "Canceling", "500");
```

#### SMTP Setup

Do not forget to enter your own SMTP details. I use Outlook because Gmail doesnt work. <br>
In the smtp.db.php file

- $mail->Username = 'YOUR EMAIL';  |  The email address that will send the emails
- $mail->Password = 'YOUR PASSWORD';  |  The password
- $mail->setFrom('SEND FROM THAT EMAIL', 'Username');  |  The email address that will send the emails and Τhe username of the email address where it will appear in the messages
- $mail->addReplyTo('info@REPLY EMAIL.com', 'Information');  |  Your Reply Email address

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

