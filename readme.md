# SBSC PHP Developer Code Test

## Prerequiste

<ul>
    <li>PHP 7</li>
    <li>Composer</li>
    <li>MySQL</li>
</ul>

## Technologies used

Modern PHP technologies were adopted for this project

Laravel: Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.
Visit [here](https://laravel.com/) for more information.


Mysql - Relational Database System used in project.

JWT - used to authorize and authenticate API routes.

Gmail - Email SMTP client that enable you to send emails.

## Installation

### Step 1.
- Begin by cloning this repository to your machine 
```
git clone https://github.com/12march/sbsctest.git
```

- Install dependencies
```
cd name && composer install
```

- Create enviromental file and variables
```
cp .env.example .env
```

- Generate app key
```
php artisan key:generate
```

### Step 2
- Next, create a new database and reference its name and username/password in the projects .env file. Below the database name is "expanse"
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sbsctest
DB_USERNAME=root
DB_PASSWORD=
```

- Go to your mailgun account and get your mailgun domain and secret key. choose an email and senders name
```
MAILGUN_DOMAIN=****
MAILGUN_SECRET=****
MAIL_FROM_ADDRESS=***@***.com
MAIL_FROM_NAME=*****
```

### Step 3
- To start the server, run the command below
```shell
$ php artisan serve
```


## API Routes
API documentation was created using POSTMAN and can be viewed at <a href="https://documenter.getpostman.com/view/11352997/T1DjkfEH"> API Docs </a>
<table>
<tr><th>HTTP VERB</th><th>ENDPOINT</th><th>FUNCTIONALITY</th></tr>
<tr><td>POST</td> <td>/api/auth/register</td>  <td>Creates a user</td></tr>
<tr><td>POST</td> <td>/api/auth/login</td>  <td>Login a user</td></tr>
<tr><td>POST</td> <td>/api/auth/logout</td>  <td>User logout</td></tr>
<tr><td>POST</td> <td>/api/password/email</td>  <td>Forgot Password</td></tr>
<tr><td>POST</td> <td>/api/password/reset</td>  <td>Reset Password</td></tr>

    
    
<tr><td>POST</td> <td>/api/categories</td>  <td>Create a category</td></tr>
<tr><td>POST</td> <td>/api/categories</td>  <td>Get list of all categories</td></tr>
<tr><td>GET</td> <td>/api/categories/{id}</td>  <td>View a particular category</td></tr>
<tr><td>DELETE</td> <td>/api/categories/{id}</td>  <td>Delete a particular category</td></tr>
<tr><td>PUT</td> <td>/api/categories/{id}</td>  <td>Update a particular category</td></tr>

<tr><td>POST</td> <td>/api/products</td>  <td>Create a product</td></tr>
<tr><td>POST</td> <td>/api/products</td>  <td>Get list of all products</td></tr>
<tr><td>GET</td> <td>/api/products/{id}</td>  <td>View a particular product</td></tr>
<tr><td>DELETE</td> <td>/api/products/{id}</td>  <td>Delete a particular product</td></tr>
<tr><td>PUT</td> <td>/api/products/{id}</td>  <td>Update a particular product</td></tr>
<tr><td>POST</td> <td>/api/factoryProducts</td>  <td>Generate 50 products with Faker</td></tr>
<tr><td>GET</td> <td>/api/exportCSV</td>  <td>Export to CSV</td></tr>
<tr><td>GET</td> <td>/api/exportPDF</td>  <td>Export to PDF</td></tr>


<tr><td>GET</td> <td>/api/factorial</td>  <td>Get the factorial of 13</td></tr>
<tr><td>POST</td> <td>/api/searchinsert</td>  <td>Search and insert indexes</td></tr>
<tr><td>POST</td> <td>/api/sortstates</td>  <td>Sort Nigeria states</td></tr>
<tr><td>POST</td> <td>/api/groupanagrams</td>  <td>Search and insert indexes</td></tr>

</table>


