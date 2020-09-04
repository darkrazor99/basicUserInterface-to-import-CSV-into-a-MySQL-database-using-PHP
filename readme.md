# Simple User Interface to Upload CSV files into a database

a simple user interface that imports a CSV file into a MySQL database using PHP then present all the imported data on a basic frontend using pagination.
any CSV file can be uploaded as long as it has the name of the field at the first row and it only has 5 columns the CSV file structure should be like this
```
|column1 | column2 | column3 | column4 | column5 |
|data 1  | data2   | data 3  | data 3  | data 4  |
```
where column1 column2 and so on will be the name of the fields inside the database and the data will be the input for each column
## Getting Started

no need to create a database just head to includes/databaseinfo.php and edit the variables according to your convenience

### Prerequisites

XAMPP or any similar service, see the link bellow for XAMPP

https://www.apachefriends.org/index.html

### development process

the task description was to basically create a basic user interface to import a given CSV file into a MYSQL database using PHP and then presenting all the imported data on a basic table.
#### Importing the CSV file
I first approached this task by reading about how to read from a CSV File form this documentation:  

https://www.php.net/manual/en/function.fgetcsv.php  

After that everything was pretty straightforward for the importing from the CSV file to the MySQL database part.

#### displaying data to a webpage  
this was probably the most difficult part of this task as I decided to use pagination which was a new concept to me at the time of making this thankfully this document describes it in a very good way:  


https://www.javatpoint.com/php-pagination  
