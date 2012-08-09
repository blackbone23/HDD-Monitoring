1. Apache 

Install :
	sudo apt-get install apache2

tambahkan site baru ke dalam konfigurasi apache : 

	sudo cp /etc/apache2/sites-available/default /etc/apache2/sites-available/hdd_monitor 

edit file /etc/apache2/sites-available/hdd_monitor : 

	tambahkan : ServerName ${your_server_name}  (sebelum DocumentRoot & hilangkan ServerAdmin)

Ganti DocumentRoot /var/www menjadi DocumentRoot /home/${user}/public_html.

Change <Directory /var/www/> to <Directory /home/${user}/public_html/>.

Cari bagian “<Directory /home/${user}/public_html/>“. dibawah baris tersebut, ubah AllowOverride None menjadi AllowOverride All.

nb : ${user} = nama user di ubuntu


Konfigurasi /etc/apache2/httpd.conf : 
	<VirtualHost *>
	ServerName localhost
	DocumentRoot /home/rully/public_html/	
	</VirtualHost>

edit /etc/hosts : 

-- tambahkan konfigurasi host baru --
127.0.1.1 atau ${IP_target}	${your_server_name}


Aktifkan konfigurasi apache website baru :
	sudo a2dissite default && sudo a2ensite hdd_monitor

	sudo a2ensite hdd_monitor
	sudo service apache2 reload


2. Php

Install php5-fpm:
	sudo apt-get install php5-fpm

Install php5-cli:
	sudo apt-get install php5-cli

Install libssh2-php untuk ssh ke client : 

	sudo apt-get install libssh2-php

	restart service php

3. Install mysql

Install mysql:
	sudo apt-get install mysql-server-5.1

Cek mysql-php :
	dpkg --list | grep php5-mysql

Jika belum terinstall :
	sudo apt-get install php5-mysql

Install library apache to php5 :
	sudo apt-get install libapache2-mod-php5


4. Python

install python package : 
	sudo apt-get install python-setuptools python-dev

install pip:
	sudo easy_install pip

psutil :
	sudo pip install psutil

Install mysql python:
	sudo apt-get install python-mysqldb


Install urllib : 
	sudo pip install urllib3


5. ssmtp

	http://tombuntu.com/index.php/2008/10/21/sending-email-from-your-system-with-ssmtp/
