PHP Sandbox
===========

This is a play ground for PHP/Zend applications.  It includes a Nginx
virtual hosting server config and some templates for application.ini,
Zend test helper class, and more 

Using phpunit
-------------

Assume we have php and phpunit built on the following location:

* /usr/dev/boilerplate/php/php-build/bin/php
* /usr/dev/boilerplate/php/php-build/bin/phpunit

We could create the bin/phpunit like the following::

  #!/bin/sh
  /usr/dev/boilerplate/php/parts/php-build/bin/php /usr/dev/boilerplate/php/parts/php-build/bin/phpunit $@

Rember to change the file mode to allow execute::

  $ chmod +x bin/phpunit

Now we could execute php unit test cases::

  $ bin/phpunit tests/SimpleTest.php
  $ bin/phpunit tests/php-core
