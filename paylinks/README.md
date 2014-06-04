# SPiD PHP Paylink example

A bare-bones PHP implementation of paylinks with SPiD.

## Usage

1. **Download the sdk-php**

   ```sh
   git clone https://github.com/schibsted/sdk-php.git
   ```

   To work out of the box, it should be placed next to this repo in the
   folder hierarchy:

   - `dev/`
     - `sdk-php/`
     - `spid-php-examples/`

2. **Fill in the configuration**

   ```sh
   cd paylinks
   cp config.php.sample config.php
   vi config.php
   ```

   Add your own credentials to the config file.

3. **Start the server**

   ```sh
   php -S localhost:8182
   ```
