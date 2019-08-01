# Installation Guide

- Clone repo

- Run composer install

- Copy .env.example to .env

- Set database parameters on the env file

```
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

- Run migration

`php artisan migrate`

- Start application

`php -S 127.0.0.1:8080`

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
