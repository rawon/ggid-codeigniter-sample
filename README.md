#GGID CodeIgniter Sample
This is a sample app to use GGID with CodeIgniter

#Dependencies
You must have [Composer](https://getcomposer.org/) installed on your computer to install dependencies. Run them:

    composer install
  
to install dependencies packages.

#Configuring
You need to configure the OAuth2 settings in file _application/controllers/Login.php_ :
* application client id
* application client secret 

## Base URL and Redirect URL
As a default base url is set to http://localhost/ (see _application/config/config.php_) and redirect URL is set to _http://localhost/index.php/login_ so you need to set your sample application in GGID to match this value. If you are running the application using different host than localhost, please change this accordingly.
