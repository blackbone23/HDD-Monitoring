import MySQLdb

conn = MySQLdb.connect (host = "localhost",
                        user = "root",
                        passwd = "bippo",
                        db = "hdd_monitor")
cursor = conn.cursor ()
cursor.execute ("SELECT VERSION()")
row = cursor.fetchone ()
print "server version:", row[0]
cursor.close ()
conn.close ()
