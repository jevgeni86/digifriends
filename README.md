# digifriends

--- Installation ---
Copy the web project folder (digifriends) to your apache web directory.
If you are using Windows and XAMPP, put the web project in <xampp_dir>\htdocs , e.g. C:\xampp\htdocs
If you are using Linux put the webproject in /var/www

When starting the application for the first time, it will automatically create a database 'digifriends'. A MySQL user that has write privileges has to be provided in the initial setup.

--- Requirements ---
PHP5 or higher
MySQL server (recommended 5.5 or higher)
Apache webserver
A webbrowser

--- Usage ---
Assuming you are using the application locally, open a browser window and visit http://localhost:80/digifriends
Apache webserver is configured to listen on port 80 by default. If your server is configured to listen on a different port, please change port in the address line accordingly.
After initial setup you will have functions for writing/retrieving data to/from the database, as well as testing whether two numbers are digifriends.

--- Notes ---
Numbers, as well as their digifriends, are automatically deleted from the database if they have not been used for more than 30 days by means of a scheduled stored procedure.
Global event scheduler has to be active to enable scheduling. It can be set to on in my.cnf or via mysql client: set global event_scheduler=on;
