# SPiD PHP Direct payment example

A bare-bones PHP implementation of direct payment with SPiD.

## Usage

1. `composer install` to install dependencies

2. **Fill in the configuration**

   ```sh
   cd config
   cp config.php.sample config.php
   vi config.php
   ```

   Add your own credentials to the config file.

3. Start the docker container with `docker-compose up` and go to `http://localhost:8181/direct-payment`.
