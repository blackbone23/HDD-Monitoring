#!/usr/bin/python

import pycurl
c = pycurl.Curl()
values = [('content1','curl python'), ('content2','ini posting data via curl melalui python script')]
resp_data = urllib.urlebcode(values)
c.setopt(pycurl.URL, "http://rully.rnd/HDD-Monitoring/hdd_monitor/index.php/site/tambah_data")
c.setopt(pycurl.POST, 1)
c.setopt(pycurl.POSTFIELDS, resp_data)
#c.setopt(pycurl.POSTFIELDS, "content1=curl python&content2=ini posting data via curl melalui python script")
c.perform()
c.close()

