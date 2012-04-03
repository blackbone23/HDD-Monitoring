#!/usr/bin/python

import commands
import re
foo = commands.getoutput("df -h")
foo_split = foo.split("\n")
foo_split.pop(0)
for string in foo_split:
	string_split = string.split(" ")
	print string_split
	
print len(foo_split)


