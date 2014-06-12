# SPiD PHP Direct payment example

A bare-bones PHP implementation of direct payment with SPiD.

## Usage

1. **Download the sdk-php**

   ```sh
   git clone https://github.com/schibsted/sdk-php.git
   ```

   To work out of the box, it should be placed next to this repo in the
   folder hierarchy.

2. **Fill in the configuration**

   ```sh
   cd direct-payment
   cp config.php.sample config.php
   vi config.php
   ```

   Add your own credentials to the config file.

3. **Start the server**

   ```sh
   php -S localhost:8183
   ```
