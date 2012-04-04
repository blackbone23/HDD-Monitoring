#!/usr/bin/python

import commands
import re
foo = commands.getoutput("df")
print foo
foo_split = foo.split("\n")
foo_split.pop(0)
for string in foo_split:
	string_split = string.split(" ")
	#print string_split
	result = re.match("(.*?\s)\s{1,20}(0|.*?\s)\s{1,20}(0|.*?[A-Z])\s{1,20}(0\s|.*?[A-Z]\s)\s{1,20}(.*?%)\s{1,20}(.*)",string)
	print result.groups()	

#print result.groups()
	
#print len(foo_split)


