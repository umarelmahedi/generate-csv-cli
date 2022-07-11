# CLI-Based-application-generate-write-in-Csv-file 
## How to install 
require as a library
```
composer require paycli/generate-csv-cli
```
clone the application
```
git clone https://github.com/umarelmahedi/generate-csv-cli.git
```
```
cd generate-csv-cli
composer install
```

## How to use
```
php bin/console list
```
#### Commands

```
php bin/console create-file
```

```
php bin/console erase-file
```

```
php bin/console current-year
```

```
php bin/console current-month
```

```
php bin/console select-year
```

```
php bin/console select-month
```
#### UnitTest
22 tests, 24 assertions
```
./vendor/bin/phpunit src/App/UnitTest
```
