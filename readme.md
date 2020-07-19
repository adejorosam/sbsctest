# SBSC PHP Developer Code Test

## Technologies used

<ul>
    <li>PHP 7</li>
    <li>Composer</li>
    <li>MySQL</li>
</ul>





## Installation

```
git clone https://github.com/samson1998/sbsctest.git

cd sbsctest

composer install

cp .env.example .env

php artisan key:generate

```


## API Routes

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
<tr><td>GET</td> <td>/api/categories/{id}</td>  <td>View a particular category</td></tr>

<tr><td>POST</td> <td>/api/products</td>  <td>Create a product</td></tr>
<tr><td>POST</td> <td>/api/products</td>  <td>Get list of all products</td></tr>
<tr><td>GET</td> <td>/api/products/{id}</td>  <td>View a particular product</td></tr>
<tr><td>DELETE</td> <td>/api/products/{id}</td>  <td>Delete a particular product</td></tr>
<tr><td>GET</td> <td>/api/products/{id}</td>  <td>View a particular product</td></tr>
<tr><td>POST</td> <td>/api/factoryProducts/</td>  <td>Generate 50 products with Faker</td></tr>
<tr><td>GET</td> <td>/api/exportCSV</td>  <td>Export to CSV</td></tr>
<tr><td>GET</td> <td>/api/exportPDF</td>  <td>Export to PDF</td></tr>


<tr><td>POST</td> <td>/api/factorial</td>  <td>Get the factorial of 13</td></tr>
<tr><td>POST</td> <td>/api/searchinsert</td>  <td>Search and insert indexes</td></tr>
<tr><td>POST</td> <td>/api/sortstates</td>  <td>Sort Nigeria states</td></tr>
<tr><td>POST</td> <td>/api/groupanagrams</td>  <td>Search and insert indexes</td></tr>




</table>
