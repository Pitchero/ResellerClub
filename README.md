# ResellerClub

A PHP SDK for [ResellerClub’s API](https://manage.resellerclub.com/kb/answer/744).

## Requirements 
* [PHP version => 7.0](http://www.php.net/)
* [GuzzleHttp Package version >= 6.3](https://github.com/guzzle/guzzle)

## Installation

## Example usage 

```php
    try {
        $api = new Reseller\Api(
             new Reseller\Config(123, 'api_key', true),
             new GuzzleHttp\Client()
        )
        
        $response = $api->businessEmailOrder()->create(
             new ResellerClub\Orders\BusinessEmails\BusinessEmailOrderRequest(
                123,
                'some-domain.co.uk',
                5,
                1,
                ResellerClub\Orders\InvoiceOption::noInvoice()
             )
        );
        
        // @todo - Handle a successful response within your codebase.
        
    } catch(\Exception $e) {
        // @todo - Handle the exceptions within your codebase.
    }
```