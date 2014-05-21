ZF2 Privat24 ![Alt text](https://api.privatbank.ua/p24api/img/privat.png "PrivatBank")
============
PrivatBank online transactions by Privat24 Merchant

To use this service you must be connected to the Privat24 Merchant http://privat24.ua 
Then add your store setup verify password and get the Merchant ID.
Customize Merchant, set a credit card for payment and so. 
Note the form, do not need to edit! All settings have already been made in the module.
--------------------------------------

Require PHP 5.4+

Configurations :

1. That needs to be done is adding it to your application's list of active modules. Add module "Privat24" in your application.config.php

2. Change configurations in module.config.php

3. Call pay form using route http://yourdomain.dev/privat24 or use a partial helper from view
```php
<?php  echo $this->formPrivate24(new \Privat24\Form\Privat24Form($config['array'], $order['array'])); // for setup see module.config.php ?>
```
--------------------------------------
In order to start using the module clone the repo in your vendor directory or add it as a submodule if you're already using git for your project:

    git clone https://github.com/stanislav-web/ZF2-Privat24.git vendor/Privat24
    or
    git submodule add     git clone https://github.com/stanislav-web/ZF2-Privat24.git vendor/Privat24

The module will also be available as a Composer package soon.


