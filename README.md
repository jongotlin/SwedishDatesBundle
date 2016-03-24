SwedishDatesBundle
==================

## Installation

Install with composer
```
$ composer require jgi/swedish-dates-bundle
```

Add the bundle to your AppKernel.
```php
new JGI\SwedishDatesBundle\JGISwedishDatesBundle(),
```

## Usage
```php
$date = $container->get('jgi.swedish_dates.datemanager')->getDate(new \Datetime('2014-12-25'));
echo $date->getDateTime()->format('Y-m-d') . ": " .
    ($date->isRedDay() ? 'red day' : 'not red day') . ' - ' . $date->getName();
// 2014-12-25: red day - Juldagen
```

## License
Bundle under the MIT License
