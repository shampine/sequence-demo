# sequence demo

This is just a demo of [Sequence](https://github.com/shampine/sequence).

## usage

1. composer install (requires php 7.4)
2. Up the built in webserver `php artisan serve`
3. Make a POST request to `http://127.0.0.1:8000/api/test`

```shell
curl --location --request POST 'http://127.0.0.1:8000/api/test' \
--form 'name="hello"' \
--form 'age="5"'
```

## quick links

Nothing in this Laravel demo codebase matters except these two locations.

How to implement a project using Sequence:
https://github.com/shampine/sequence-demo/tree/master/app/Sequence

How a controller looks with Sequence implemented:
https://github.com/shampine/sequence-demo/blob/master/app/Http/Controllers/Controller.php
