# SPiD PHP SSO example

A PHP bare-bones implementation of SSO with SPiD.

## Usage

1. **Download the sdk-php**

   ```sh
   git clone https://github.com/schibsted/sdk-php.git
   ```

   To work out of the box, it should be placed next to this repo in the
   folder hierarchy.

2. **Fill in the configuration**

   ```sh
   cd sso
   cp config.php.sample config.php
   vim config.php
   ```

   Add your own credentials to the config file.

3. **Start the server**

   ```sh
   php -S localhost:8181
   ```
