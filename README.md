# taskManager

### Requirements :
- PHP version 7.1 minimum required
- MySQL version 5.6 minimum required
- Composer

### Installation:
- Active extensions php_pdo.dll & php_pdo_mysql.dll
	For WAMP in settings menu go to PHP Settings --> PHP Extensions --> php_pdo & php_pdo_mysql.dll
- Create an empty database named 'taskmanager'
- Edit the [MySQL] section in config.ini (./application/core/config.ini) with your parameters
- Install composer and copy the file composer.phar in the current directory
- Launch the following command in the current directory : php composer.phar install
- Launch the following command in the current directory : vendor\bin\doctrine orm:schema-tool:update --force