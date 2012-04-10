#!/usr/bin/python

import poster.streaminghttp
import register_openers
import poster
register_openers()
values = {'content1':'curl python', 'content2':'ini posting data via curl melalui python script'}
url = "http://rully.rnd/HDD-Monitoring/hdd_monitor/index.php/site/tambah_data"
datagen, headers = poster.encode.multipart_encode(values)
request = urllib2.Request(url, datagen, headers)
result = urllib2.urlopen(request)
print result.read()
