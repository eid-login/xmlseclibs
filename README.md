# Fork of robrichards/xmlseclibs for eID-Templates

This is a fork of [robrichards/xmlseclibs](https://github.com/robrichards/xmlseclibs/), which has been created to make the library match the needs of the eID-Templates project.

The main changes are:

* Support for RSASSA-PSS based XML signature algorithms via usage of the RSA implementation of [phpseclib](http://phpseclib.sourceforge.net/)

Please refer to the upstream`s [readme](https://github.com/robrichards/xmlseclibs/blob/master/README.md) for further information.

## Running tests

- Although there is a `phpunit.xml` file, phpunit is not actually used.
- Download run-tests.php script (`wget https://raw.githubusercontent.com/php/php-src/master/run-tests.php`).
- Run tests: `php run-tests.php tests/`
