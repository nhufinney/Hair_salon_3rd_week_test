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

-->CREATE DATABASE:

CREATE DATABASE hair_salon;

\c hair_salon

CREATE TABLE stylists (id serial PRIMARY KEY, stylist varchar);

CREATE TABLE clients (id serial PRIMARY KEY, name varchar, stylist_id int);

CREATE DATABASE hair_salon_test WITH TEMPLATE hair_salon;

--> IMPORT DATABASE:

In psql: CREATE DATABASE hair_salon; 

\c hair_salon;

In new terminal window: 

\i hair_salon.sql
