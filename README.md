# Digifriends


### Requirements ###
- PHP5 or higher
- MySQL server (MySQL 5.6.33 was used when building this project, but lower 5.x versions should work, too)
- Apache webserver
- A webbrowser

### Installation ###
This project assumes that MySQL server and Apache webserver are installed and running. It also assumes that PHP5 is installed.
Copy the web project directory to your apache web directory. If you are using XAMPP put the web project in _<xampp_dir>\htdocs_, e.g. _C:\xampp\htdocs_. Under Linux put the web project in _/var/www_ (if you are not using XAMPP for Linux).

When starting the application for the first time, it will automatically create a database _digifriends_. A MySQL user that has write privileges has to be provided in the initial setup.

### Usage ###
Assuming you are using the application locally and the directory name is _digifriends_, open a browser window and visit http://localhost:80/digifriends
Apache webserver is configured to listen on port 80 by default. If your server is configured to listen on a different port, please change port in the address line accordingly.
After initial setup you will have functions for writing/retrieving data to/from the database, as well as testing whether two numbers are digifriends. You can also delete the database and start over by clicking the red button (drop database).

### Notes ###
Numbers, as well as their digifriends, are automatically deleted from the database if they have not been used for more than 30 days by means of a scheduled stored procedure.
In your MySQL server global event scheduler has to be active to enable scheduling. It can be set to on in my.cnf or via mysql client using this command: _set global event_scheduler=on;_
