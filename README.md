# My-CMS

## Create the database!

CREATE DATABASE MyPelatologio;

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
)

CREATE TABLE customers (
  customersID int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  customersFname varchar(50) NOT NULL,
  customersLname varchar(50) NOT NULL,
  customersEmail varchar(50) NOT NULL,
  customersPhone varchar(50) NOT NULL,
  customersCompany varchar(50) NOT NULL,
  customersAddress varchar(50) NOT NULL,
  customersLevel varchar(50) NOT NULL,
  customersOrders varchar(50) NOT NULL,
  customersCreate_at datetime NOT NULL DEFAULT current_timestamp()
)