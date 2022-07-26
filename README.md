# Generate CSV file 

application that will create a CSV file detailing the dates for the next 12 months when Basic Salary and Salary Bonus are paid knowing that:
- Staff get their basic monthly pay on last working day of the month (MON-FRI).
- On 10th of each month bonuses are paid, unless the 10th is Saturday or Sunday. In
  which case the bonus is paid on first working day after the 10th.

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
