# SuiteCRM Provider for OAuth 2.0 Client

[![Latest Stable Version](https://poser.pugx.org/chadhutchins/oauth2-suitecrm/v/stable)](https://packagist.org/packages/chadhutchins/oauth2-suitecrm)
[![Total Downloads](https://poser.pugx.org/chadhutchins/oauth2-suitecrm/downloads)](https://packagist.org/packages/chadhutchins/oauth2-suitecrm)
[![License](https://poser.pugx.org/chadhutchins/oauth2-suitecrm/license)](https://packagist.org/packages/chadhutchins/oauth2-suitecrm)

This package provides SuiteCRM OAuth 2.0 support for the PHP League's [OAuth 2.0 Client](https://github.com/thephpleague/oauth2-client).

## Installation

To install, use composer:

```
composer require chadhutchins/oauth2-suitecrm
```

### Usage

Usage is the same as The League's OAuth client, using `\Chadhutchins\OAuth2\Client\Provider\SuiteCRM` as the provider.

### Authorization Code Flow

```php
$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId'                => 'SuiteCRM Client ID',    // The client ID assigned to you by the provider
    'clientSecret'            => 'SuiteCRM Client Secret',    // The client password assigned to you by the provider
    'redirectUri'             => 'https://my.example.com/your-redirect-url/',
    'urlAuthorize'            => 'https://your-suitecrm-instance.com/Api/authorize', // not used but still required by library
    'urlAccessToken'          => 'https://your-suitecrm-instance.com/Api/access_token',
    'urlResourceOwnerDetails' => 'https://your-suitecrm-instance/Api/V8/meta/modules',
]);

try {

    // Try to get an access token using the resource owner password credentials grant.
    $accessToken = $provider->getAccessToken('password', [
        'username' => 'suitecrm_username',
        'password' => 'suietcrm_password'
    ]);

} catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

    // Failed to get the access token
    exit($e->getMessage());

}
```

### Managing Scopes

SuiteCRM does not support scopes at this time. Limit access using ACL controls on the user you authenticate with.

## Testing

``` bash
$ ./vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](https://github.com/chadhutchins/oauth2-suitecrm/blob/master/CONTRIBUTING.md) for details.


## Credits

- [Nile Suan](https://github.com/nilesuan)
- [All Contributors](https://github.com/chadhutchins/oauth2-suitecrm/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/multidimension-al/oauth2-shopify/blob/master/LICENSE) for more information.
