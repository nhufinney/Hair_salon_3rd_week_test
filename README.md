HAIR SALON APP
1. Function: this app is to manage a hair salon. The hair salon owners can manage their stylists by many functions such as adding new, editing, deleting each stylist or deleting all stylists. The app helps hair salon owners manage clients at the same functions and keep track which client is belong to which stylist.

2. Set up requirements: the program needs to install 3 independencies that are Silex, Twig and PHPUnit.

3. Author: Nhu Finney.

4. Contact or question: Epicodus.com.

5. License and copyright: free and open to everyone.

6. Database structure:

   hair_salon database has 2 tables:

   i. Stylists table: 2 columns: Id, stylist_name;
   ii. Clients table: 3 colums: Id, client_name, Id_stylist;

7. SQL code:

Guest=# CREATE DATABASE hair_salon;
CREATE DATABASE
Guest=# \c hair_salon
You are now connected to database "hair_salon" as user "Guest".
hair_salon=# CREATE TABLE stylists (id serial PRIMARY KEY, stylist varchar);
CREATE TABLE
hair_salon=# CREATE TABLE clients (id serial PRIMARY KEY, name varchar, stylist_id int);
CREATE TABLE
hair_salon=# CREATE DATABASE hair_salon_test WITH TEMPLATE hair_salon;
CREATE DATABASE
hair_salon=# \c hair_salon_test
You are now connected to database "hair_salon_test" as user "Guest".
hair_salon_test=#


Notes:
I have created the Client table then realized the name of column "name" should be changed into "client_name" but do not know how to change column name. But it's not too bad.
Lessons: before creating a new table, should spend more time to consider names of columns to be used to make sure that they are clear and easy to understand and recognize later on.
