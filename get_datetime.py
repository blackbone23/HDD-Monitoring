#! /usr/bin/python

import commands

date = commands.getoutput("date --rfc-3339=date")
time = commands.getoutput("date +%k:%M:%S")
print date
print time
