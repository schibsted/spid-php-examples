# Getting started with the SPiD PHP SDK

The following is a minimal example of using the PHP SDK. It fetches the
`/endpoints` endpoint, which returns a description of all available endpoints.

**NB!** To run the example, you need to know your client ID and API secret.

## Usage with composer

1. **Require the sdk**
    
    Run ```composer require schibsted/sdk-php``` and when composer ask you for a version constraint just type in ```dev-master``` to get the latest release. Now, if you already have a project using composer the classes you need will be available to you.

    If you don't use composer for the moment, you will see that composer created a new file called composer.json and downloaded all the files you need to run the next step. Feel free to read more about composer at their webpage for further details about how composer works.

2. **Create and edit the example file**

    Copy the contents of the getting-started.php in this repo and change ```require_once("../../sdk-php/src/Client.php");``` to ```require('vendor/autoload.php');```as this will autoload the files you need.

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
