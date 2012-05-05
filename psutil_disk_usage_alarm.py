#!/usr/bin/python

import psutil
import json
import pycurl
import urllib
import socket

partitions = psutil.disk_partitions()

for partition in partitions :
  if (partition.mountpoint == "/" or partition.mountpoint == "/home"):
    device = partition.device
    mount =  partition.mountpoint
    filesystype = partition.fstype
    if(mount == "/") :
      check_slash = psutil.disk_usage(mount)
      if(check_slash.percent >= 60):
	s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
	s.connect(("gmail.com",80))
	IP = s.getsockname()[0]
        check_slash = [('IP',IP),('mount on',mount), ('total',check_slash.total), ('used',check_slash.used), ('free',check_slash.free), ('percent',check_slash.percent), ('filetype',filesystype), ('device',device)]
	c = pycurl.Curl()
	resp_data = urllib.urlencode(check_slash)
	c.setopt(pycurl.URL, 'http://rully.tr4c3r.dev/HDD-Monitoring/hdd_monitor/index.php/site/add_disk_alert')
	c.setopt(pycurl.POST, 1)
	c.setopt(pycurl.POSTFIELDS, resp_data)
	c.perform()
	c.close()
    else :
      check_slash_home = psutil.disk_usage("/home")
      if(check_slash_home.percent >= 60):
	s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
	s.connect(("gmail.com",80))
	IP = s.getsockname()[0]
        check_slash_home = [('IP',IP),('mount on',mount), ('total',check_slash_home.total), ('used',check_slash_home.used), ('free',check_slash_home.free), ('percent',check_slash_home.percent),  ('filetype',filesystype), ('device',device)]
	c = pycurl.Curl()
	resp_data = urllib.urlencode(check_slash_home)
	c.setopt(pycurl.URL, 'http://rully.tr4c3r.dev/HDD-Monitoring/hdd_monitor/index.php/site/add_disk_alert')
	c.setopt(pycurl.POST, 1)
	c.setopt(pycurl.POSTFIELDS, resp_data)
	c.perform()
	c.close()

