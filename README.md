SwedishDatesBundle
==================

## Installation

Install with composer by adding this to your `composer.json`-file.
```
"require":
    ....
    "jgi/swedish-dates-bundle": "dev-master"
```
Add the bundle to your AppKernel.
```php
new JGI\SwedishDatesBundle(),
```

## Usage
```php
$date = $container->get('jgi.swedish_dates.datemanager')->getDate(new \Datetime('2014-12-25'));
echo $date->getDateTime()->format('Y-m-d') . ": " . ($date->isRedDay() ? 'red day' : 'not red day');
// 2014-12-25: red day
```

## License
Bundle under the MIT License
