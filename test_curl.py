#! /usr/bin/python

import urllib
import pycurl

c = pycurl.Curl()
data = [('content1','send via pycurl'),('content2','ini barusan di send via pycurl.. hahaha...')]
resp_data = urllib.urlencode(data)
c.setopt(pycurl.URL, 'http://rully.rnd/HDD-Monitoring/hdd_monitor/index.php/site/tambah_data')
c.setopt(pycurl.POST, 1)
c.setopt(pycurl.POSTFIELDS, resp_data)
c.perform()
c.close()
