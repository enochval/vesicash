# Installation Guide

- Clone repo

- Run `composer install`

- Copy .env.example to .env

- Run `docker-compose up -d`

- Run `sudo chmod 777 -R ./storage`

- Go to phpMyAdmin at (http://0.0.0.0:44679/)
```
    phpMyAdmin credential

    User: root
    Pass: secret

```
- Create a database called `vesicash`

- Run `docker exec -it core bash`

- Run `php artisan migrate`

- Run `exit`

- The Application is at (http://0.0.0.0:44678)

- Note

```
Example request body

{
    "sender_email": "john@doe.com",
    "sender_phone": 123456789,
    "recipient_email": "jane@doe.com",
    "recipient_phone": "1234567890",
    "items": [
        {
            "title": "Some title",
            "description": "Some description",
            "price": 123
        },
        {
            "title": "Another title",
            "description": "Another description",
            "price": 456
        },
        ...
    ]
}
```

- Resource

```
- POST /api/v1/escrow-transaction - Create a new escrow transaction record
- PATCH /api/v1/escrow-transaction/{transaction_id} - Update an existing escrow transaction record
- DELETE /api/v1/escrow-transaction/{transaction_id} - Delete an existing escrow transaction record
```
