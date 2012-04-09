#!/usr/bin/python

import psutil
import pycurl
import urllib
import socket

partitions = psutil.disk_partitions()
s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
s.connect(("gmail.com",80))
IP = s.getsockname()[0]
for partition in partitions :
    if (partition.mountpoint == "/" or partition.mountpoint == "/home"):
	dev = partition.device
	mount =  partition.mountpoint
	filestype = partition.fstype
	disk = psutil.disk_usage(mount)
	used = disk.used
	free = disk.free
	percent = disk.percent
	total = disk.total
	c = pycurl.Curl()
	data = [('IP',IP),('device',dev),('filetype',filestype),('mount_on',mount),('used',used),('free',free),('percent',percent),('total',total)]
	resp_data = urllib.urlencode(data)
	c.setopt(pycurl.URL, 'http://rully.rnd/HDD-Monitoring/hdd_monitor/index.php/site/add_disk_status')
	c.setopt(pycurl.POST, 1)
	c.setopt(pycurl.POSTFIELDS, resp_data)
	c.perform()
	c.close()
    
s.close()

