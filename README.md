# DaveDevelopment/StackRickrollRoulette

A (http://stackphp.org)[Stack] middleware for randomly rickrolling clients.

## Example

``` php
<?php

$app = new Silex\Application();

$app->get('/', function () {
    return 'some useful content';
});

$stack = (new Stack\Builder())
    ->push('DaveDevelopment\StackRickrollRoulette');

$app = $stack->resolve($app);

```

## Options

* **url** (optional): The url to redirect clients to
