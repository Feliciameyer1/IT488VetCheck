# IT488VetCheck
Application VetCheck Repository



Helpful php links:

	(https://www.php.net/manual/en/index.php)
	[https://www.w3schools.com/php/]
	[https://www.geeksforgeeks.org/php/]
	[https://www.youtube.com/playlist?list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-]
	[https://www.youtube.com/watch?v=9gEPiIoAHo8]

Link to Install and configure Apache 2.4 and PHP 7 on Windows:
https://danielarancibia.wordpress.com/2015/09/27/installing-apache-2-4-and-php-7-for-development-on-windows/

Configure Apache to use the "htdocs" that is part of the GitHub repository:
1) Locate your Apache server's httpd.conf file (probably at C:\Apache24\conf\httpd.conf)
2) Figure out where the GitHub repository files are on your hard drive
2) Open the httpd.conf file in an editor (Notepad is fine)
3) Locate the "DocumentRoot" and "<Directory" lines (perhaps around line 260)
4) Set both of these values to be the "htdocs" folder within the GitHub repository

	Example:
		DocumentRoot "C:/Users/chris.darnell/Documents/GitHub/IT488VetCheck/htdocs"
		<Directory "C:/Users/chris.darnell/Documents/GitHub/IT488VetCheck/htdocs">

More links to come later on.
