# Shop4U
Installation in Linux:

Pre-requisites:
- Apache2
- PHP 8.0
- Git
- msmtp
- MySQLi
- openssl
- ssl-cert
- vim
# How to install Apache2 web server
1.	In your server, go to command line terminal
2.	Run the following commands
sudo apt-get update
sudo apt install apache2
3.	Now wait few minutes until the necessary modules are installed.
# How to install vim
1.	In your server go to command line terminal
2.	Run the following command to check for any updates
sudo apt-get update
3.	Run the following command to install vim
sudo apt-get install vim
4.	Now vim has been installed in your server.
# How to install PHP 8.0
5.	In your server go to command line terminal
6.	Run the following command to check for any updates
sudo apt-get update
7.	Add the php repository to the cli
sudo add-apt-repository ppa:ondrej/php
8.	Install php 8.0
sudo apt install php8.0
9.	Press y to allow the installation.
10.	Install the necessary extensions
sudo apt install php8.0-cli php8.0-common php8.0-imap php8.0-redis php8.0-xml php8.0-zip php8.0-mbstring
11.	Wait until all the extensions are installed and follow the prompts
# How to install MySQL
1.	In your server go to command line terminal
2.	Run the following command to check for any updates
sudo apt-get update
3.	Run the following command to install MySQL
sudo apt install mysql-server
4.	Follow the prompts and make sure to add root password and note it down. If you cannot add it, you will need to reset your root password later which is a bit of a hassle.
5.	Run the following command to start mysql service
sudo systemctl start mysql.service
6.	Now the MySQL server has been installed and started on your server.
# How to install phpMyAdmin
1.	In your server go to command line terminal
2.	Run the following command to check for any updates
sudo apt-get update
3.	Run the following command to install phpMyAdmin
sudo apt install phpmyadmin php8.0-gettext
4.	Follow the screen prompts and make sure to install it in Apache2 and set the application password.
5.	Run the following command to enable mbstring
sudo phpenmod mbstring
6.	Restart the Apache server
sudo systemctl restart apache2
7.	Now phpMyAdmin has been installed in your server.
8.	Go to <yourserverip/address>/phpMyAdmin to access it.
# How to disable auto indexing to prevent files from being directly visible
1.	In your server go to command line terminal
2.	Run the following command to disable auto indexing
sudo a2dismod –force autoindex
3.	Run the below command to restart apache server
sudo systemctl restart apache2
4.	Now auto indexing has been disabled from your server.
# How to install git cmdlets
1.	In your server go to command line terminal
2.	Run the following command to check for any updates
sudo apt-get update
3.	Run the following command to install phpMyAdmin
sudo apt-get install git
4.	Now git has been installed in your server
5.	Run the following command for username and email; for git account
git config --global user.name”<name of user>”
git config –-global user.email “<email address>”
6.	Now the git is ready for any commits ahead.
# How to install msmtp for smtp relay
1.	In your server go to command line terminal
2.	Run the following command to check for any updates
sudo apt-get update
3.	Run the following command to install msmtp
sudo apt-get install msmtp msmtp-mta
4.	Follow the prompts to install.
5.	Open the config file for msmtp with the following command
sudo vim /etc/msmtprc
6.	Paste the following and save. Make sure to change your info in the file.
defaults
auth on
tls on
tls_trust_file /etc/ssl/certs/ca-certificates.crt
logfile ~/.msmtp.log
account gmail
host smtp.gmail.com
port 587
from username@gmail.com
user username@gmail.com
password password
account default : gmail
7.	Change the tls_trust_file directory to where your SSL certificate is installed.
8.	You can disable certificate check by adding following line in the above file.
tls_certcheck off
9.	Now msmtp is ready to send email.
# How to clone repository in your server
1.	Go to the folder where you would like to clone the repository. Preferably html folder.
sudo cd /var/www/html/
2.	Run the following command to clone the repository
sudo git clone narayansapkota225/Shop4U
3.	Now the repository will be cloned in your folder.
# How to install database
1.	Download the SQL dump file from GitHub.
2.	There are two dump files, one with sample data and one without sample data.
3.	When you have downloaded your dump file, import it to phpMyAdmin.
Now, you have successfully installed the product in your Linux system.
