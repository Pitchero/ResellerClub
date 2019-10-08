# ResellerClub
[![Build Status](https://api.travis-ci.org/Pitchero/ResellerClub.svg?branch=master)](https://travis-ci.org/Pitchero/ResellerClub)

A PHP SDK for [ResellerClub’s API][1].

## Requirements
* PHP >= 7.0

## Installation
This package is available through [Packagist][4]. To install in your project via
[Composer][5]:

    $ composer require pitchero/reseller-club

## Example Usages

### Business Emails
[API Documentation](https://manage.resellerclub.com/kb/node/2155).

#### Creating a order
[API Documentation](https://manage.resellerclub.com/kb/node/2156)

```php
try {
    $api = new ResellerClub\Api(
         new ResellerClub\Config(123, 'api_key', true),
         new GuzzleHttp\Client()
    )

    $request = new ResellerClub\Orders\BusinessEmails\Requests\BusinessEmailOrderRequest(
        $customerId = 123,
        $domain = 'some-domain.co.uk',
        $numberOfAccount = 5,
        $forNumberOfMonths = 1,
        ResellerClub\Orders\InvoiceOption::noInvoice()
    );    

    $response = $api->businessEmailOrder()->create($request);

    // @todo - Handle a successful response within your codebase.

} catch(ResellerClub\Exceptions\ApiException $e) {
    // @todo - Handle the exception within your codebase.
}
```

#### Deleting an order
[API Documentation](https://manage.resellerclub.com/kb/node/2162)

```php
try {
    $api = new ResellerClub\Api(
         new ResellerClub\Config(123, 'api_key', true),
         new GuzzleHttp\Client()
    );

    $request = new ResellerClub\Orders\Order(
        $orderId = 123
    );

    $response = $api->businessEmailOrder()->delete($request);

    // @todo - Handle the successful response within your codebase.

} catch(ResellerClub\Exceptions\ApiException $e) {
    // @todo - Handle the exception within your codebase.
}
```

#### Getting an order
[API Documentation](https://manage.resellerclub.com/kb/node/2163)

```php
try {
    $api = new ResellerClub\Api(
         new ResellerClub\Config(123, 'api_key', true),
         new GuzzleHttp\Client()
    );

    $request = new ResellerClub\Orders\Order(
        $orderId = 123
    );   

    $response = $api->businessEmailOrder()->get($request);

    // @todo - Handle the successful response within your codebase.

} catch(ResellerClub\Exceptions\ApiException $e) {
    // @todo - Handle the exception within your codebase.
}
```

#### Renewing an order
[API Documentation](https://manage.resellerclub.com/kb/node/2157)

```php
try {
    $api = new ResellerClub\Api(
         new ResellerClub\Config(123, 'api_key', true),
         new GuzzleHttp\Client()
    );

    $request = new ResellerClub\Orders\BusinessEmails\Requests\RenewRequest(
        new ResellerClub\Orders\Order(
           $orderId = 123
        ),
        $months = 1,
        $numberOfAccounts = 1,
        ResellerClub\Orders\InvoiceOption::noInvoice()
    );

    $response = $api->businessEmailOrder()->renew($request);

    // @todo - Handle the successful response within your codebase.

} catch(ResellerClub\Exceptions\ApiException $e) {
    // @todo - Handle the exception within your codebase.
}
```

#### Add email account to a business email order
[API Documentation](https://manage.resellerclub.com/kb/node/2158)

```php
try {
    $api = new ResellerClub\Api(
         new ResellerClub\Config(123, 'api_key', true),
         new GuzzleHttp\Client()
    );

    $request = new ResellerClub\Orders\BusinessEmails\Requests\AddEmailAccountRequest(
        new ResellerClub\Orders\Order(
           $orderId = 123
        ),
        $numberOfAccounts = 1,
        ResellerClub\Orders\InvoiceOption::noInvoice()
    );

    $response = $api->businessEmailOrder()->addEmailAccounts($request);

    // @todo - Handle the successful response within your codebase.

} catch(ResellerClub\Exceptions\ApiException $e) {
    // @todo - Handle the exception within your codebase.
}
```


#### Delete email account from an existing business email order
[API Documentation](https://manage.resellerclub.com/kb/node/2159)

```php
try {
    $api = new ResellerClub\Api(
         new ResellerClub\Config(123, 'api_key', true),
         new GuzzleHttp\Client()
    );

    $request = new ResellerClub\Orders\BusinessEmails\Requests\DeleteEmailAccountRequest(
        new ResellerClub\Orders\Order(
           $orderId = 123
        ),
        $numberOfAccounts = 1
    );

    $response = $api->businessEmailOrder()->deleteEmailAccounts($request);
        
    // @todo - Handle the successful response within your codebase.

} catch(ResellerClub\Exceptions\ApiException $e) {
    // @todo - Handle the exception within your codebase.
}
```

### Email Accounts
[API Documentation](https://manage.resellerclub.com/kb/node/1034).

#### Creating an email account
[API Documentation](https://manage.resellerclub.com/kb/node/1037)

```php
try {
        $api = new ResellerClub\Api(
             new ResellerClub\Config(123, 'api_key', true),
             new GuzzleHttp\Client()
        );

        $request = ResellerClub\Orders\EmailAccounts\Requests\CreateRequest(
            ResellerClub\Orders\Order(
               $orderId = 123
            ),
            ResellerClub\EmailAddress(
               $email = 'john.doe@some-domain.co.uk'
            ),
            string $password,
            ResellerClub\EmailAddress(
               $notificationsEmail = 'john.doe@backup-email.co.uk'
            ),
            $firstName = 'John',
            $lastName = 'Doe',
            $countryCode = 'UK',
            $languageCode = 'en'
        );

        $response = $api->emailAccount()->create($request);

        // @todo - Handle the successful response within your codebase.

} catch(ResellerClub\Exceptions\ApiException $e) {
    // @todo - Handle the exception within your codebase.
}
```

#### Deleting an email account
[API Documentation](https://manage.resellerclub.com/kb/node/1049)

```php
try {
        $api = new ResellerClub\Api(
             new ResellerClub\Config(123, 'api_key', true),
             new GuzzleHttp\Client()
        );

        $request = ResellerClub\Orders\EmailAccounts\Requests\DeleteRequest(
            ResellerClub\Orders\Order(
                $orderId = 123
            ),   
            ResellerClub\EmailAddress(
                $email = 'john.doe@some-domain.co.uk'
            )                     
        );

        $response = $api->emailAccount()->delete($request);

        // @todo - Handle the successful response within your codebase.

} catch(ResellerClub\Exceptions\ApiException $e) {
    // @todo - Handle the exception within your codebase.
}
```

### Email forwarders

#### Create an email forwarder
[API Documentation](https://manage.resellerclub.com/kb/node/1038)

```php
try {
        $api = new ResellerClub\Api(
             new ResellerClub\Config(123, 'api_key', true),
             new GuzzleHttp\Client()
        );

        $request = ResellerClub\Orders\EmailForwarders\Requests\CreateRequest(
              ResellerClub\Orders\Order(
                 $orderId = 123
              ),   
              ResellerClub\EmailAddress(
                $email = 'john.doe@some-domain.co.uk'
              )                   
        );

        $response = $api->emailForwarder()->create($request);

        // @todo - Handle the successful response within your codebase.

} catch(ResellerClub\Exceptions\ApiException $e) {
    // @todo - Handle the exception within your codebase.
}
```

#### Deleting an email forwarder
[API Documentation](https://manage.resellerclub.com/kb/node/1049)

```php
try {
        $api = new ResellerClub\Api(
             new ResellerClub\Config(123, 'api_key', true),
             new GuzzleHttp\Client()
        );

        $request = ResellerClub\Orders\EmailAccounts\Requests\DeleteRequest(
            ResellerClub\Orders\Order(
                $orderId = 123
            ),   
            ResellerClub\EmailAddress(
                $email = 'john.doe@some-domain.co.uk'
            )                      
        );

        $response = $api->emailForwarder()->delete($request);

        // @todo - Handle the successful response within your codebase.

} catch(ResellerClub\Exceptions\ApiException $e) {
    // @todo - Handle the exception within your codebase.
}
```
## Helpful articles from the ResellerClub knowledge base
1. [How to create an account on the staging platform](https://manage.resellerclub.com/kb/node/173)
1. [Where to find and regenerate an API key](https://manage.resellerclub.com/kb/node/3188)

#### Add an A record
[API Documentation](https://manage.resellerclub.com/kb/node/1093)

```php
try {
    $ttl = new ResellerClub\TimeToLive(86400);
    $request = new ResellerClub\Dns\A\Requests\AddRequest(
        $domain = 'another-testing-domain.com',
        $record = 'test',
        new ResellerClub\IPv4Address('127.0.0.1'),
        $ttl
    );

    $response = $api->aRecord()->add($request);

    // @todo - Handle the successful response within your codebase.

} catch(ResellerClub\Exceptions\ApiException $e) {
    // @todo - Handle the exception within your codebase.
}
```

#### Update a CNAME record
[API Documentation](https://manage.resellerclub.com/kb/node/1101)

```php
try {
    $ttl = new ResellerClub\TimeToLive(86400);
    $request = new ResellerClub\Dns\Cname\Requests\UpdateRequest(
        $domain = 'your.com',
        $record = 'www',
        $currentValue = 'cname.oldservice.com',
        $newValue = 'cname.newservice.com',
        $ttl
    );

    $response = $api->cnameRecord()->update($request);

    // @todo - Handle the successful response within your codebase.

} catch(ResellerClub\Exceptions\ApiException $e) {
    // @todo - Handle the exception within your codebase.
}
```

## License
Licensed under the [MIT License][2].

## Issues
If you find an issue with this package, please open a [GitHub Issue][3].

[1]: https://manage.resellerclub.com/kb/node/744
[2]: LICENSE.md
[3]: https://github.com/Pitchero/ResellerClub/issues/new
[4]: https://packagist.org/packages/pitchero/reseller-club
[5]: https://getcomposer.org/
