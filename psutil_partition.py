#!/usr/bin/python

import psutil
import socket
import pycurl
import urllib

partitions = psutil.disk_partitions()
s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
s.connect(("gmail.com",80))
IP = s.getsockname()[0]
for partition in partitions :
    if (partition.mountpoint == "/" or partition.mountpoint == "/home"):
	dev = partition.device
	mount =  partition.mountpoint
	filestype = partition.fstype
	#check_json = json.dumps({'mount on':mount, 'filetype':filesystype, 'device':device})
	#print check_json
	c = pycurl.Curl()
	data = [('IP',IP),('device',dev),('filetype',filestype),('mount_on',mount)]
	resp_data = urllib.urlencode(data)
	c.setopt(pycurl.URL, 'http://rully.tr4c3r.dev/HDD-Monitoring/hdd_monitor/index.php/site/add_disk_partition')
	c.setopt(pycurl.POST, 1)
	c.setopt(pycurl.POSTFIELDS, resp_data)
	c.perform()
	c.close()
    
  
s.close()
