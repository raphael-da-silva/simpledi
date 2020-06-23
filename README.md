### Simple DI

The goal of this project is the creation of simple container. This container is inspired by Pimple.

#### Usage

The container class implements the ArrayAccess interface, this mean that you can use the object like an array.

```php

$di = new \SimpleDI\Container;

$di['Config'] = function($di){

    $config = new \StdClass;
    $config->path = 'path/to/views';

    return $config;

};

// Use with ArrayAccess
$di['Config'];

// Or with class method
$di->get('Config');

// Get closure from container without execute
$di->raw('Config');

```
