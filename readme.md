# Mail API

For this task I've used Laravel 5.5 as back-end framework. Reasons:
    1.1. It's framework that I know best;
    1.2. Wanted to try new 5.5 version features, for example Resource class for API;

## Run project
1. Copy to host directory;
2. `cp .env.example .env`;
3. `composer install`;
4. `php artisan key:generate`;
5. Set database and etc. in .env file;
6. `php artisan migrate --seed`; **Note:** after UserSeeder seeded it will output Admin user `api_token`.

## Endpoins
All endpoints can be accessed using HTTP GET method. Request must have headers:
* Accept application/json.
* Authorization Bearer {{api_token}}

### List of endpoints
1. /api/message/{{message_uid}}
2. /api/message/{{message_uid}}/read
3. /api/message/{{message_uid}}/archive
4. /api/messages
5. /api/messages/archived

## If it would be real project
1. I would create relationship between Message and User. So, message would have `sender_id` instead of `sender` with name string;
2. There should be many-to-many table to record by who message was read.
3. If it’s more like email client and messages are private, message should have `receiver_id` field with User model id as value.
4. Currently `api_token` for User is simple random string. It should be generated unique between all user.
5. Would be go to add 'v1' prefix for endpoints. It would be easier to update API later.
