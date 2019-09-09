#Weather API

###### Description

- Single route API for getting the current temperature by city, developed with Symfony 4.3. Integrates with https://openweathermap.org

###### Usage

- GET request:
	- http://localhost:8000/temperature?city={CITY_NAME}&units={UNIT_FORMAT}
	
	- CITY_NAME string required
	- UNIT_FORMAT string optional 
		- Default: 'metric', Options: 'metric'|'imperial' 
		- Note: 'imperial' will return temp in Fahrenheit, while 'metric' will return Celsius. Celsius is set as default and will be returned if no value is set
		
- Response example:
	{'temperature': '23.1'}

###### To deploy and run

- Clone this repo or unpack the install files to a server with the following base dependencies installed:
	- Composer (https://getcomposer.org/download/)
	- PHP >= v.7.2
		Minimum required extensions: php7.2-cli php7.2-common php7.2-json php7.2-opcache php7.2-mbstring php7.2-xml php7.2-zip

	
- From the project's root directory, run the following commands:
	- composer install
	- php bin/console server:run *:8000
	
Note: The final command runs a development webserver, by default serving on port 8000. Please ensure that this port is open on your instance.
