#!/usr/bin/python

import commands
foo = commands.getoutput("df -h")

print foo
