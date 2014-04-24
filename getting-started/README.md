# Getting started with the SPiD PHP SDK

The following is a minimal example of using the PHP SDK. It fetches the
`/endpoints` endpoint, which returns a description of all available endpoints.

**NB!** To run the example, you need to know your client ID and API secret.

## Usage

1. **Download the sdk-php**

   ```sh
   git clone https://github.com/schibsted/sdk-php.git
   ```

   To work out of the box, it should be placed next to this repo in the
   folder hierarchy.

2. **Run the example**

   ```sh
   php getting-started.php <client-id> <secret> <sign-secret>
   ```

   Replace pointy bracketed items with your credentials.

This will print the JSON-decoded response from the server, which shows all
available endpoints along with details on how to interact with them.
