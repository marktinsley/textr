# Setup

Follow these steps to setup this app and send a text message _(hopefully I didn't miss something. this is just from memory)_.

```
composer install

npm install

npm run dev

cp .env.example .env

php artisan key:generate

# Set your twilio env vars in the .env file.

docker-compose up -d
```

Register here: http://localhost:8888/register
