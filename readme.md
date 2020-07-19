# SBSC PHP Developer Code Test


## Application Description
This is a simple API built for the sole purpose of finding a lasting solution to the myriads of a accomodation issues in O.O.U Ago-iwoye environs. Students don't find it easy in their search for apartment. It was for that purpose, that was why this API was built.

## Technologies used

PHP 7
Composer
MySQL





## Installation

```
git clone https://github.com/samson1998/Findr-backend.git

cd Findr-backend

composer install

cp .env.example .env

php artisan key:generate

php -S 127.0.0.1:8080 -t public/
```


## API Routes

<table>
<tr><th>HTTP VERB</th><th>ENDPOINT</th><th>FUNCTIONALITY</th></tr>
<tr><td>POST</td> <td>/api/v1/users</td>  <td>Creates a user</td></tr>
<tr><td>POST</td> <td>/api/v1/login</td>  <td>Login a user</td></tr>
<tr><td>PATCH</td> <td>/api/v1/users</td>  <td>Update a user</td></tr>
<tr><td>GET</td> <td>/api/v1/users</td>  <td>View all users</td></tr>
<tr><td>GET</td> <td>/api/v1/agents</td>  <td>View all agents</td></tr>
<tr><td>GET</td> <td>/api/v1/dashboard</td>  <td>View user dashboard</td></tr>
<tr><td>GET</td> <td>/api/v1/users/{id}</td>  <td>View a particular user</td></tr>
 <tr><td>PATCH</td> <td>/api/v1/users</td>  <td>Update a user</td></tr>
<tr><td>PATCH</td> <td>/api/v1/users</td>  <td>Upload profile picture</td></tr>
<tr><td>POST</td> <td>/api/v1/ratehouse/{id}</td>  <td>Rate a listing</td></tr>
<tr><td>POST</td> <td>/api/v1/rateagent/{id}</td>  <td>Rate an agent</td></tr>
    
    
<tr><td>POST</td> <td>/api/v1/apartments</td>  <td>Create an apartment listing</td></tr>
<tr><td>POST</td> <td>/api/v1/apartments</td>  <td>Get list of all apartments</td></tr>
<tr><td>GET</td> <td>/api/v1/apartments/{id}</td>  <td>View a particular apartment</td></tr>
<tr><td>DELETE</td> <td>/api/v1/apartments/{id}</td>  <td>Delete a particular apartment</td></tr>
<tr><td>GET</td> <td>/api/v1/apartments/{id}</td>  <td>View a particular apartment</td></tr>
<tr><td>POST</td> <td>/api/v1/results</td>  <td>Filter apartments by price and amount</td></tr>
<tr><td>GET</td> <td>/api/v1/aweekago</td>  <td>View all houses posted 7 days ago</td></tr>



<tr><td>POST</td> <td>/api/v1/comments</td>  <td>Comment on a listing</td></tr>
<tr><td>PATCH</td> <td>/api/v1/comments/{id}</td>  <td>Update a comment</td></tr>
<tr><td>DELETE</td> <td>/api/v1/comments/{id}</td>  <td>Delete a particular comment</td></tr>



<tr><td>POST</td> <td>/api/v1/favorites</td>  <td>Bookmark a listing</td></tr>
<tr><td>DELETE</td> <td>/api/v1/favorites/{id}</td>  <td>Unbookmark a listing</td></tr>
<tr><td>GET</td> <td>/api/v1/favorites</td>  <td>View user bookmarks</td></tr>

<tr><td>POST</td> <td>/api/v1/views/{id}</td>  <td>View a listing</td></tr>







</table>
