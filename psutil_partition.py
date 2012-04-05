#!/usr/bin/python

import psutil
import json
partitions = psutil.disk_partitions()
for partition in partitions :
  device = partition.device
  mount =  partition.mountpoint
  filesystype = partition.fstype
  check_json = json.dumps({'mount on':mount, 'filetype':filesystype, 'device':device})
  print check_json