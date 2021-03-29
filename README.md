# sequence demo

This is just a demo of [Sequence](https://github.com/shampine/sequence).

To use:

1. composer install (requires php 7.4)
2. Up the built in webserver `php artisan serve`
3. Make a POST request to `http://127.0.0.1:8000/api/test`

```shell
curl --location --request POST 'http://127.0.0.1:8000/api/test' \
--form 'name="hello"' \
--form 'age="5"'
```

A full write up can be found on [Medium](https://medium.com/gosteady/day-5-sequence-how-to-guide-56c0af1b2303)
