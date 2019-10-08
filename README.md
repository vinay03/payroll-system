# Instllation

Run following commands to install this command line utility.
```
git clone https://github.com/vinay03/payroll-system.git
cd payroll-system
composer install
composer dump-autoload
```

<br>


# Use
## Prerequisite

Please make sure that you have PHP v7.x installed and running. Run following command in your terminal.
```
php --version
```

`NOTE: If above command gives any error, then please install PHP and make sure that it is available to use through command line.`

<br>

## Test Run
```
php generate-dates ./exportData.csv
```

<br>

## View Output
To view the data generated in `./exportData.csv` file, you can open the file in any text editor. To view file contents on command line, use following command :
```
cat ./exportData.csv
```

<br>

# Exit Codes

This command line utility emits exit codes which makes it more useful.

`0: Successful Execution`

`1: Error: File name is not specified in command line.`

`2: Error: Failed to create output CSV file due to lack of permissions or an invalid path.`


<br>

# Dependencies

## 1. nesbot/carbon

	// To install
	composer require nesbot/carbon

	// Documentation
	https://carbon.nesbot.com/docs/

<br>

## 2. league/csv
	// To install
	composer require league/csv

	// Documentation
	https://csv.thephpleague.com/


<br>

# Developer Tweaks
1. To change format of the values displayed in `Month` column, please edit following code in `generate-dates` file
```
const MONTH_FORMAT = 'F Y';
```

<br>

2. To change format of the values displayed in `Salary Payment Date` column, edit following code in `generate-dates` file
```
const SALARY_DATE_FORMAT = 'd/m/Y';
```
<br>

3. To change format of the values displayed in `Bonus Payment Date` column, edit following code in `generate-dates` file
```
const BONUS_DATE_FORMAT = 'd/m/Y';
```