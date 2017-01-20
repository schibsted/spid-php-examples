# Getting started with the SPiD PHP SDK

The following is a minimal example of using the PHP SDK. It fetches the
`/endpoints` endpoint, which returns a description of all available endpoints.

**NB!** To run the example, you need to know your client ID and API secret.

## Usage with composer

1. `composer install` to install dependencies

2. **Fill in the configuration**

   ```sh
   cd config
   cp config.php.sample config.php
   vi config.php
   ```

   Add your own credentials to the config file.

3. **Run the example**

   ```sh
   php getting-started.php <client-id> <secret> <sign-secret>
   ```

   Replace pointy bracketed items with your credentials.

This will print the JSON-decoded response from the server, which shows all
available endpoints along with details on how to interact with them.
