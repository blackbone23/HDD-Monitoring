import commands

date = commands.getoutput("date --rfc-3339=date")

date_split = date.split("-")
year = date_split[0]
month = date_split[1]
day = date_split[2]

print "year is %s" % year
print "month is %s" % month
print "day is %s" % day
