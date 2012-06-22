Overview
--------

Test setup for a PHP MVC application.  The framework provides for an API combined with a dynamic web site.  

Status
------

This is only a starting point for a robust PHP application and a work in progress.  This is not PRODUCTION ready and will likely be updated frequently in the near term. 

Todo
----

Make a decision on the database interface.  To ORM or not to ORM.  Add in the cache interface for Memcache. 
Continue to flesh out example controllers. 

Setup/Install
-------------

Development:

Install PHP 5.4 for a live test server (lower version should work for hosted server).
Use the script "startdev.sh" to launch the test server.

Install Pow for quick URL access: http://pow.cx/
The existing config.ru forwards to the 5.4 test server above. 

Using
-----

Search and replace all instances of "appname" in the directory. 
$> grep -r "appname" *

Edit "templates/body.tpl" for the basic web layout (bootstrap fluid layout).

3rd Party Software
------------------

Smarty - http://www.smarty.net/
Log4PHP - https://logging.apache.org/log4php/
Bootstrap - http://twitter.github.com/bootstrap/
