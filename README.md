# Zend Framework 3 JWT API

An example project showing a JWT Auth simple usage.

# Disclaimer

This project doesn't focus on providing a user storage, actually it focus in providing a example of JWT token encoding, decoding and refreshing (in development) using Zend Framework 3.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Test](#test)

## Installation

```sh
git clone https://github.com/renanliberato/zfjwtapi.git

cd zfjwtapi
```

## Usage

It is needed to be incremented inside the application configuration the following structure, to provide to the AuthController the needed JWT key:

```php
return [
    'auth' => [
        'key' => '[YOUR_KEY]'
    ]
];
```

This array can be implemented inside a config/autoload/local.php and not versioned, or inside another Zend Framework 3 compatible config file.

## Test

```sh
composer test
```