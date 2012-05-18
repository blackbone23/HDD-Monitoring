#!/usr/bin/python

import psutil
import json
partitions = psutil.disk_partitions()
json_arr=[]
for partition in partitions :
  if (partition.mountpoint == "/" or partition.mountpoint == "/home"):
    device = partition.device
    mount =  partition.mountpoint
    filesystype = partition.fstype
    if(mount == "/") :
      check_slash = psutil.disk_usage(mount)
      check_slash = {'mount_on':mount, 'total':check_slash.total, 'used':check_slash.used, 'free':check_slash.free, 'percent':check_slash.percent, 'filetype':filesystype, 'device':device}
      json_arr.append(check_slash)
    else :
      check_slash_home = psutil.disk_usage(mount)
      check_slash_home = {'mount_on':mount, 'total':check_slash_home.total, 'used':check_slash_home.used, 'free':check_slash_home.free, 'percent':check_slash_home.percent,  'filetype':filesystype, 'device':device}
      json_arr.append(check_slash_home)

print json.dumps(json_arr)

