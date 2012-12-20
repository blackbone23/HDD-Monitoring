rully.tr4c3r
must installed first : 
sudo apt-get install apache2
sudo apt-get install php5-fpm
sudo apt-get install php5-cli
sudo apt-get install mysql-server-5.1
sudo apt-get install php5-mysql
sudo apt-get install python-mysqldb
sudo apt-get install libapache2-mod-php5

=============================================================

configuring apache2 : 
sudo cp /etc/apache2/sites-available/default /etc/apache2/sites-available/ryan (tambahkan site baru di dalam apache)
ServerName ${your_server_name}
=============================================================

edit file /etc/apache2/sites-available/hdd_monitor : 

add ->  (sebelum DocumentRoot & hilangkan ServerAdmin)

Change DocumentRoot /var/www to DocumentRoot /home/${user}/public_html.

Change <Directory /var/www/> to <Directory /home/${user}/public_html/>.

Scroll down the file until you see the part “<Directory /home/${user}/public_html/>“. Underneath that line of code, change AllowOverride None to AllowOverride All.

	nb : ${user} = nama user di ubuntu

================================================================
Configuring /etc/apache2/httpd.conf : 
<VirtualHost *>
ServerName localhost
DocumentRoot /home/rully/public_html/
</VirtualHost>

================================================================

edit /etc/hosts : 

-- add new dns record --
127.0.1.1 / ${IP_target}	${your_server_name}

================================================================

sudo a2dissite default && sudo a2ensite hdd_monitor

sudo a2ensite hdd_monitor
sudo service apache2 reload


check php5-mysql : 
dpkg --list | grep php5-mysql


===============================================================
install python package : 

sudo apt-get install python-setuptools python-dev

install pip:
sudo easy_install pip

psutil :
sudo pip install psutil

===============================================================
Get IP address : 
sebenernya sih bebas mau coba cari IP public pake cara bneran ato cara abal2.. pake cara bneran bisa kek gini : 

import urllib
IP = urllib.urlopen('http://automation.whatismyip.com/n09230945.asp').read()
print IP

cuman masalahnya di kita khn kebanyakan IP nya dynamic. So buat pemecahannya gini.. Asumsi saja bahwa si server terhubung langsung ke internet lewat IP static public. Jadi pemecahan si script adalah sebagai berikut : 

s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
s.connect(("gmail.com",80))
IP = s.getsockname()[0]
s.close()


===============================================================

Jika error di urllib package

sudo pip install urllib3

===============================================================

send mail menggunakan ssmtp -> http://tombuntu.com/index.php/2008/10/21/sending-email-from-your-system-with-ssmtp/


===============================================================
Cronjob : 

Menggunakan crontab

1. Cron untuk per disk usage dilakukan perhari (file : psutil_disk_usage.py)
2. Cron untuk check persentase hdd dilakukan per 10 menit (file : psutil_disk_usage_alarm.py)

3. File untuk cek partisi dieksekusi sendiri / tidak dijadikan cron (file : psutil_partition.py)



===============================================================

install libssh2-php untuk ssh ke client : 

sudo apt-get install libssh2-php

restart service php


install ssh2 via pecl (TIDAK DIGUNAKAN, JELEK PISAN PACKAGENYA) : 

sudo pecl install ssh2 channel://pecl.php.net/ssh2-0.11.3

or,

sudo pecl install ssh2 -> setelah liat version channel, copy & paste setelah ssh 2 dan install

===============================================================



PHP PACKAGE : Jika sudah depresi, gunakan install php5-dev dan masalah anda akan terselesaikan :P


to contact me : Rully - 082153354799 (pin bb : 2156D3C9)
