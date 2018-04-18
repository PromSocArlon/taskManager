# taskManager

### Requirements :
- PHP version 7.1 minimum required
- MySQL version 5.6 minimum required
- Composer

### Installation:
- Active extensions php_pdo.dll & php_pdo_mysql.dll
	For WAMP in settings menu go to PHP Settings --> PHP Extensions --> php_pdo & php_pdo_mysql.dll
- Load install.sql
- Edit the [MySQL] section in config.ini (./application/core/config.ini) with your parameters
- Install composer and copy the file composer.phar in the current directory
- Launch the following command in the current directory : php composer.phar install