#!/usr/bin/python

import commands
foo = commands.getoutput("df -h")

file = open("foo","a")
file.write(foo)
file.write("\n\n")
