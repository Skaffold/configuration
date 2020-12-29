# Configuration Repository
The configuration repository is a simple class and contract to handle getting and setting of configuration data.

## To install
`composer require skaffold/configuration`

## Getting started
The configuration repository accepts an optional array of initial configuration keys.

```php

use Skaffold\Configuration\ConfigurationRepository;

$config = new ConfigurationRepository;

// Sets "key" to the value of "value"
$config->set('key', 'value');

// Attempts to get "key" if it is not found, defaults to "Some default value" over null
$config->get('key', 'Some default value');

// Deletes the specified key from the repository
$config->delete('key');

// Retrieves all the values from the repository
$config->all();

// Removes all the keys from the repository
$config->flush();

```
