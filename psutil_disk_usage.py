#!/usr/bin/python

import psutil
import json
import MySQLdb
partitions = psutil.disk_partitions()
db = MySQLdb.connect(host="0.0.0.0",port=3306,user="root",passwd="bippo",db="hdd_monitor" )
cursor = db.cursor()
latest_id = cursor.execute("select id_status from hdd_status order by id_status DESC")
for partition in partitions :
  if (partition.mountpoint == "/" or partition.mountpoint == "/home"):
    IP_address = "192.168.11.31"
    dev = partition.device
    mount =  partition.mountpoint
    filestype = partition.fstype
    disk = psutil.disk_usage(mount)
    used = disk.used
    free = disk.free
    percent = disk.percent
    total = disk.total
    latest_id = latest_id + 1
    try:
      cursor.execute("""INSERT INTO hdd_status VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s)""" , (latest_id,IP_address,dev,filestype,mount,used,free,percent,total))
      db.commit()
      print "data berhasil diinputkan"
    except:
      db.rollback()
      print "data tidak berhasil diinputkan"

db.close()

