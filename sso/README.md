# SPiD PHP SSO example

A PHP bare-bones implementation of SSO with SPiD.

## Usage

First download the sdk-php:

```sh
git clone https://github.com/schibsted/sdk-php.git
```

To work out of the box, it should be placed next to this repo in the
folder hierarchy.

Then fix the configuration:

```sh
cd examples/php/sso/
cp config.php.sample config.php
```

Add your own credentials to the config file.

Then start the server with:

```sh
php -S localhost:8181
```
